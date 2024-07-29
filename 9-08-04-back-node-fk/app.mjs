import express from 'express';
import cors from 'cors';
import session from 'express-session';
import sequelize from './database/mysql.mjs';
import CSS from 'connect-session-sequelize';

import VeiculoController from './controllers/veiculo_controller.mjs';
import UserController from './controllers/user_controller.mjs';
import userRouter from './routers/user_router.mjs';

import veiculoRouter from './routers/veiculo_router.mjs';

import locacaoRouter from './routers/locacao_router.mjs';

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

app.use(cors({
    origin: [
        'http://localhost:5500',
        'http://127.0.0.1:5500'
    ],
    credentials: true
}));

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

app.get('/veiculos', VeiculoController.all);
app.get('/veiculos/:id', VeiculoController.one);
app.post('/veiculos', VeiculoController.new);
app.put('/veiculos', VeiculoController.edit);
app.delete('/veiculos', VeiculoController.remove);

app.listen(port, () => {
    console.log(`Example app listening on port ${port}`);
});
