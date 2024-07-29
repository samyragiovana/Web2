
import Veiculo from "../Models/veiculo.mjs";

const veiculoController = {
    "new": async (req, res) => {
        const created = await Veiculo.create({
            fabricante: req.body.fabricante,
            modelo: req.body.modelo
        });
        res.send(created);
    },
    "one": async (req, res) => {
        const v = await Veiculo.findOne({
            where: { id: req.params.id }
        })
        res.json(v);
    },

    "all": async (req, res) => {
        res.json(await Veiculo.findAll());
    },

    "edit": async (req, res) => {
        const v = await Veiculo.findOne({
            where: { id: req.body.id }
        });
        v.fabricante = req.body.fabricante;
        v.modelo = req.body.modelo;
        await v.save();
        res.json(v);

    },
    "delete": async (req, res) => {
        const v = await Veiculo.findOne({
            where: { id: req.body.id }
        });
        await v.destroy();
        res.json(v);

    }


};

export default veiculoController;
