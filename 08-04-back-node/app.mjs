import express from 'express';
import cors from 'cors';
import session from 'express-session';
import sequelize from './Database/mysql.mjs';
import CSS from 'connect-session-sequelize';

import veiculoController from './controllers/veiculoController.mjs';
import UserController from './controllers/userController.mjs';

const app = express();
const port = 3000;

const SequelizeStore = CSS(session.Store);

app.use(
    session({
        secret: '#7UIERU933E00LERI##327345&6',
        store: new SequelizeStore({
            db: sequelize
        })
    })
);

app.use(cors());

app.use(express.json());
app.use(express.urlencoded());

app.post('/user', UserController.new);
app.post('/login', UserController.login);
app.get('/logged', UserController.logged);
app.get('/logout', UserController.logout);

// Rotas para veículos, elas apenas são acionadas se o usuário estiver logado
app.use((req, res, next) => {
    if (req.session.logged) {
        next();
    } else {
        res.json({ logged: false });
    }
});

app.get('/veiculos', veiculoController.all);
app.get('/veiculos/:id', veiculoController.one);
app.post('/veiculos', veiculoController.new);
app.put('/veiculos', veiculoController.edit);
app.delete('/veiculos', veiculoController.delete);

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});