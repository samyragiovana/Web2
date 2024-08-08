import sequelize from "../database/mysql.mjs";
import { DataTypes } from "sequelize";

const User = sequelize.define('User', {
    email: DataTypes.STRING,
    senha: DataTypes.STRING
});

// User.sync({
//     force:true
// });

export default User;