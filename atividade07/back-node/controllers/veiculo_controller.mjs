import Veiculo from "../models/veiculo.mjs";

const VeiculoController = {
  new: async (req, res) => {
    const created = await Veiculo.create({
      fabricante: req.body.fabricante,
      modelo: req.body.modelo,
      cor: req.body.cor,
      listagem: req.body.listagem,
    });
    res.send(created);
  },
  one: async (req, res) => {
    const v = await Veiculo.findOne({
      where: { id: req.params.id },
    });
    res.json(v);
  },
  all: async (req, res) => {
    res.json(await Veiculo.findAll());
  },
  edit: async (req, res) => {
    const v = await Veiculo.findOne({
      where: { id: req.body.id },
    });
    v.fabricante = req.body.fabricante;
    v.modelo = req.body.modelo;
    v.cor = req.body.cor;
    v.listagem = req.body.listagem;
    await v.save();
    res.json(v);
  },
  remove: async (req, res) => {
    const v = await Veiculo.findOne({
      where: { id: req.body.id },
    });
    await v.destroy();
    res.json(v);
  },
};

export default VeiculoController;
