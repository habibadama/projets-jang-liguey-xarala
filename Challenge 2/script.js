const taskList = document.getElementById("task-list");

function addTask() {
    const title = document.getElementById("task-title").value;
    const description = document.getElementById("task-description").value;
    const deadline = document.getElementById("task-deadline").value;
    const priority = document.getElementById("task-priority").value;

    if (title === "") {
        alert("Veuillez saisir un titre pour la tâche.");
        return;
    }

    const task = document.createElement("div");
    task.classList.add("task");
    task.innerHTML = `
        <h3>${title}</h3>
        <p>Description: ${description}</p>
        <p>Date limite: ${deadline}</p>
        <p>Priorité: <span class="priority">${priority}</span></p>
        <button onclick="completeTask(this)">Terminé</button>
        <button onclick="editTask(this)">Modifier</button>
        <button onclick="deleteTask(this)">Supprimer</button>
    `;

    taskList.appendChild(task);

    document.getElementById("task-title").value = "";
    document.getElementById("task-description").value = "";
    document.getElementById("task-deadline").value = "";
}

function completeTask(button) {
    const task = button.parentElement;
    task.classList.toggle("completed");
}

function editTask(button) {
    const task = button.parentElement;
    const title = task.querySelector("h3");
    const description = task.querySelector("p:nth-child(2)");
    const deadline = task.querySelector("p:nth-child(3)");
    const priority = task.querySelector(".priority");

    const newTitle = prompt("Modifier le titre de la tâche", title.textContent);
    if (newTitle !== null) {
        title.textContent = newTitle;
    }

    const newDescription = prompt("Modifier la description de la tâche", description.textContent.replace("Description: ", ""));
    if (newDescription !== null) {
        description.textContent = `Description: ${newDescription}`;
    }

    const newDeadline = prompt("Modifier la date limite de la tâche", deadline.textContent.replace("Date limite: ", ""));
    if (newDeadline !== null) {
        deadline.textContent = `Date limite: ${newDeadline}`;
    }

    const newPriority = prompt("Modifier la priorité de la tâche", priority.textContent);
    if (newPriority !== null) {
        priority.textContent = newPriority;
    }
}

function deleteTask(button) {
    const task = button.parentElement;
    taskList.removeChild(task);
}
