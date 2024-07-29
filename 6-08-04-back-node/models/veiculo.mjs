import sequelize from "../database/mysql.mjs";
import { DataTypes } from "sequelize";

const Veiculo = sequelize.define('Veiculo', {
    fabricante: DataTypes.STRING,
    modelo: DataTypes.STRING
});

export default Veiculo;