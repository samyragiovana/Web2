

import express from 'express';
import veiculoController from './controllers/veiculoController.mjs';

const app = express()
const port = 3000

app.use(express.json());
app.use(express.urlencoded());

app.get('/veiculos', veiculoController.all);
app.get('/veiculos/:id', veiculoController.one);
app.post('/veiculos', veiculoController.new);
app.put('/veiculos', veiculoController.edit);
app.delete('/veiculos', veiculoController.delete);

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})