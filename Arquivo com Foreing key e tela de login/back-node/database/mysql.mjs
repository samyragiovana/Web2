import { Sequelize } from "sequelize";

const sequelize = new Sequelize("mysql://root:root@localhost:3306/dewii2024");
//const sequelize = new Sequelize("mysql://root@localhost:3306/dewii2024node");

sequelize.sync();


export default sequelize;