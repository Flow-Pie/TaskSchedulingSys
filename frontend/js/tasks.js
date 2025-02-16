document.addEventListener("DOMContentLoaded", loadTasks);

function loadTasks() {
    fetch("/public/api/tasks.php")
        .then(response => response.json())
        .then(data => {
            let taskList = document.getElementById("task-list");
            taskList.innerHTML = ""; // Clear existing tasks

            data.forEach(task => {
                let li = document.createElement("li");
                li.textContent = `${task.title} - ${task.status}`;
                taskList.appendChild(li);
            });
        })
        .catch(error => console.error("Error fetching tasks:", error));
}
