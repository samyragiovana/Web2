import express from 'express';
import cors from 'cors';
import lojaController from './controllers/lojaController.mjs'; 

const app = express();
const port = 3000;

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true })); 

app.get('/lojas', lojaController.all);          
app.get('/lojas/:id', lojaController.one);     
app.post('/lojas', lojaController.new);         
app.put('/lojas', lojaController.edit);         
app.delete('/lojas', lojaController.delete);    

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`);
});
