import User from "../models/user.mjs";
import bcrypt from "bcrypt";

const saltRounds = 10;

const UserController = Object.create(Object.prototype);

UserController.new = async (req, res) => {

    if (req.body.email && req.body.senha === req.body.repetirsenha) {

        const hash = bcrypt.hashSync(req.body.senha, saltRounds);

        const created = await User.create({

            email: req.body.email,

            senha: hash

        });

        res.json({ registrado: true, mensagem: "Registrado!" });

    } else {

        res.json({ registrado: false, mensagem: "Erro ao registrar!" });

    }

};

UserController.existeUsuario = async (req, res) => {

    const count = await User.count();    

    res.json({ existeusuario: count > 0 });

};


UserController.login = async (req, res) => {
    const v = await User.findOne({
        where: { email: req.body.email }
    });
    if (v) {
        if (await bcrypt.compare(req.body.senha, v.senha)) {
            req.session.logged = true;
            req.session.email = v.email;
            console.log('Sessão após login:', req.session);
            res.json({ logged: req.session.logged });
        } else {
            console.log('Senha incorreta');
            res.json({ logged: false });
        }
    } else {
        console.log('Usuário não encontrado');
        res.json({ logged: false });
    }
};

UserController.logout = async (req, res) => {
    req.session.logged = false;
    req.session.email = null;
    res.json({ logged: req.session.logged });
};

UserController.logged = async (req, res) => {

    const count = await User.count();

    if (count == 0) {

        res.json({ logged: false, semusuario: true });

    } else {

        res.json({ logged: req.session.logged ? true : false });

    }

};

export default UserController;