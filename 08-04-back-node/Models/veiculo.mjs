import sequelize from "../Database/mysql.mjs";

import { DataTypes } from "sequelize";

const Veiculo  = sequelize.define('Veiculo', {
    fabricante: DataTypes.STRING,
    modelo: DataTypes.STRING,
});

await Veiculo.sync({});

export default Veiculo;
