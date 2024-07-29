import sequelize from "../Database/mysql.mjs";
import { DataTypes } from "sequelize";

const User = sequelize.define('User', {
    email: DataTypes.STRING,
    senha: DataTypes.STRING
});

export default User;