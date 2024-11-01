const backendUrl = 'http://localhost:3000/api/todo';
function putTodo(todo) {
    fetch(backendUrl, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(todo)
    })
        .then(response => response.json())
        .then(json => showToastMessage(json.message))
        .catch(error => showToastMessage('Failed to delete todos...'))
}

function postTodo(todo) {
    fetch(backendUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(todo)
    })
        .then(response => response.json())
        .then(json => showToastMessage(json.message))
        .catch(error => showToastMessage('Failed to delete todos...'))
}

function deleteTodo(todo) {
    fetch(backendUrl, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: todo.id})
    })
        .then(response => response.json())
        .then(json => showToastMessage(json.message))
        .catch(error => showToastMessage('Failed to delete todos...'));
}

function getTodos() {
    fetch(backendUrl)
        .then(response => response.json())
        .then(json => drawTodos(json))
        .catch(error => showToastMessage('Failed to retrieve todos...'));
}

function getEnvVariables() {
    fetch(backendUrl, {
        method: 'OPTIONS',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(json => setHeader(json))
        .catch(error => showToastMessage('Failed to delete todos...'))
}

getEnvVariables();
getTodos();


