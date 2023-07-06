Vídeo explicativo sobre a API: https://youtu.be/vA7SPl689Ko

Documentação da API de Tarefas
A API de Tarefas fornece endpoints para gerenciar tarefas, permitindo listar, criar, visualizar, atualizar e excluir tarefas. Abaixo está a documentação dos endpoints disponíveis:

Base URL: http://seuservidor.com/api

Listar todas as tarefas
Retorna uma lista de todas as tarefas cadastradas.

URL: /tasks
Método: GET
Parâmetros de URL: Nenhum
Resposta de sucesso (200 OK): Retorna um array JSON com todas as tarefas cadastradas. Cada tarefa contém os seguintes campos:
id (integer): O ID único da tarefa.
titulo (string): O título da tarefa.
descricao (string): A descrição da tarefa.
status (string): O status da tarefa, que pode ser "concluida" ou "nao_concluida".



Criar uma nova tarefa
Cria uma nova tarefa com base nos dados fornecidos.

URL: /tasks
Método: POST
Parâmetros de URL: Nenhum
Corpo da requisição: Os seguintes campos devem ser enviados no corpo da requisição em formato JSON:
titulo (string, obrigatório): O título da tarefa.
descricao (string, obrigatório): A descrição da tarefa.
status (string, obrigatório): O status da tarefa, que pode ser "concluida" ou "nao_concluida".
Resposta de sucesso (201 Created): Retorna um JSON com os detalhes da tarefa recém-criada, incluindo o ID único gerado para ela.



Obter detalhes de uma tarefa
Retorna os detalhes de uma tarefa específica com base no ID fornecido.

URL: /tasks/{task}
Método: GET
Parâmetros de URL:
task (integer, obrigatório): O ID único da tarefa.
Resposta de sucesso (200 OK): Retorna um JSON com os detalhes da tarefa, incluindo o ID, título, descrição e status.



Atualizar uma tarefa existente
Atualiza os dados de uma tarefa existente com base no ID fornecido.

URL: /tasks/{task}
Método: PUT
Parâmetros de URL:
task (integer, obrigatório): O ID único da tarefa.
Corpo da requisição: Os seguintes campos devem ser enviados no corpo da requisição em formato JSON:
titulo (string, obrigatório): O título atualizado da tarefa.
descricao (string, obrigatório): A descrição atualizada da tarefa.
status (string, obrigatório): O status atualizado da tarefa, que pode ser "concluida" ou "nao_concluida".
Resposta de sucesso (200 OK): Retorna um JSON com os detalhes da tarefa atualizada.



Excluir uma tarefa
Exclui uma tarefa com base no ID fornecido.

URL: /tasks/{task}
Método: DELETE
Parâmetros de URL:
task (integer, obrigatório): O ID único da tarefa.
Resposta de sucesso (204 No Content): Retorna uma resposta vazia indicando que a tarefa foi excluída com sucesso.
Tratamento de erros
Em caso de falha na validação dos dados enviados para criar ou atualizar uma tarefa, a API retornará uma resposta com o status 422 Unprocessable Entity, contendo uma mensagem de erro e detalhes sobre os campos inválidos.

Se ocorrer um erro durante o processamento da requisição por qualquer motivo, a API retornará uma resposta com o status 500 Internal Server Error, contendo uma mensagem genérica de erro.

Espero que esta documentação seja útil para você compreender e utilizar a API de Tarefas. Se você tiver alguma dúvida adicional ou precisar de mais informações, sinta-se à vontade para perguntar.