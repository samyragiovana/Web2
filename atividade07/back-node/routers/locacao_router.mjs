import { Router } from "express";

import LocacaoController from "../controllers/locacao_controller.mjs";

const locacaoRouter = Router();

locacaoRouter.get("/", LocacaoController.all);

locacaoRouter.get("/:id", LocacaoController.one);

locacaoRouter.post("/", LocacaoController.new);

locacaoRouter.put("/", LocacaoController.edit);

locacaoRouter.delete("/", LocacaoController.remove);

export default locacaoRouter;
