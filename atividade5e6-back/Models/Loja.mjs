import sequelize from "../Database/mysql.mjs";
import { DataTypes } from "sequelize";

const Loja = sequelize.define('Loja', {
    fabricante: DataTypes.STRING,
    modelo: DataTypes.STRING,
    ano: DataTypes.INTEGER,         
    marca: DataTypes.STRING,        
    estoque: DataTypes.INTEGER      
});

await Loja.sync({});

export default Loja;
