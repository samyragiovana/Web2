import Loja from "../Models/Loja.mjs";

const lojaController = {
    "new": async (req, res) => {
        const created = await Loja.create({
            fabricante: req.body.fabricante,
            modelo: req.body.modelo,
            ano: req.body.ano,          
            marca: req.body.marca,      
            estoque: req.body.estoque  
        });
        res.send(created);
    },
    "one": async (req, res) => {
        const l = await Loja.findOne({
            where: { id: req.params.id }
        })
        res.json(l);
    },

    "all": async (req, res) => {
        res.json(await Loja.findAll());
    },

    "edit": async (req, res) => {
        const l = await Loja.findOne({
            where: { id: req.body.id }
        });
        l.fabricante = req.body.fabricante;
        l.modelo = req.body.modelo;
        l.ano = req.body.ano;       
        l.marca = req.body.marca;   
        l.estoque = req.body.estoque; 
        await l.save();
        res.json(l);
    },
    "delete": async (req, res) => {
        const l = await Loja.findOne({
            where: { id: req.body.id }
        });
        await l.destroy();
        res.json(l);
    }
};

export default lojaController;
