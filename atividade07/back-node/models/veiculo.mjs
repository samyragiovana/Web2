import sequelize from "../database/mysql.mjs";
import { DataTypes } from "sequelize";

const Veiculo = sequelize.define("Veiculo", {
  fabricante: DataTypes.STRING,
  modelo: DataTypes.STRING,
  cor: DataTypes.STRING,
  listagem: DataTypes.STRING,
});


timestamps: false; // Desativa createdAt e updatedAt

export default Veiculo;
