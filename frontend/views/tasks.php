<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>assets/styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Outfit Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Font Awesome Icons -->
</head>

<body>
    <nav class="sidebar menu" aria-label="Sidebar Navigation">
        <div class="menu-toggle">
            ☰
        </div>

        <div class="logo" role="heading" aria-level="1">LOGO</div>
        <a href="#" aria-label="Dashboard"><img src="<?= ROOT ?>assets/images/dashboard.png"
                alt="Dashboard Icon">Dashboard</a>
        <a href="#" aria-label="Tasks"><img src="<?= ROOT ?>assets/images/clipboard.png" alt="Task Icon">Task</a>
        <a href="#" aria-label="New Task"><img src="<?= ROOT ?>assets/images/signature.png" alt="New Task Icon">New
            Task</a>
        <a href="#" aria-label="Reports"><img src="<?= ROOT ?>assets/images/bar-chart.png"
                alt="Reports Icon">Reports</a>


        <div class="profile" role="region" aria-label="User Profile">
            <div class="profile-pic">
                <img src="<?= ROOT ?>assets/images/man.png" alt="User Profile Picture">
            </div>
            <div class="profile-info">
                <!-- Dynamic profile update from js -->
                <div>Logged In As: <span>User</span></div>
                <div>Access Level: <span>High</span></div>
                <div><span> </span></div>
            </div>
        </div>
    </nav>

    <div class="content main" aria-label="Main Content">
        <header class="task-header">
            <h2>Here are your tasks!</h2>
            <div class="controls">
                <div class="filter-dropdown">
                    <button type="button" class="filter-toggle">
                        <i class="fa-solid fa-filter"></i> Filter
                    </button>
                    <ul class="dropdown-options">
                        <li data-filter="completed">1.Completed Tasks</li>
                        <li data-filter="pending">2.Pending Tasks</li>
                        <li data-filter="all">3.All Tasks</li>
                    </ul>
                </div>


                <div class="sort-dropdown">
                    <button type="button" class="sort-toggle" aria-label="Sort Tasks" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa-solid fa-arrow-down-wide-short"></i> Sort
                    </button>
                    <ul class="dropdown-options">
                        <li data-sort="name">1. Sort by Name</li>
                        <li data-sort="date">2. Sort by Date</li>
                        <li data-sort="status">3. Sort by Status</li>
                    </ul>
                </div>
            </div>
        </header>

        <section class="task-list" aria-label="Task List">
            <div class="task-item" role="listitem">
                <label>
                    <input type="checkbox" aria-label="Mark Task as Complete"> Task Name
                </label>
                <div class="time">
                    <span>⏰ 6:00-7:00</span>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle" aria-label="Task Options" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#" aria-label="Edit Task">Edit<i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#" aria-label="Delete Task">Delete<i class="fa-solid fa-trash"></i></a>
                            <a href="#" aria-label="Mark Task as Done">Mark as Done<i
                                    class="fa-regular fa-circle-check"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="task-item" role="listitem">
                <label>
                    <input type="checkbox" aria-label="Mark Task as Complete"> Task Name
                </label>
                <div class="time">
                    <span>⏰ 6:00-7:00</span>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle" aria-label="Task Options" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#" aria-label="Edit Task">Edit<i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#" aria-label="Delete Task">Delete<i class="fa-solid fa-trash"></i></a>
                            <a href="#" aria-label="Mark Task as Done">Mark as Done<i
                                    class="fa-regular fa-circle-check"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="task-item" role="listitem">
                <label>
                    <input type="checkbox" aria-label="Mark Task as Complete"> Task Name
                </label>
                <div class="time">
                    <span>⏰ 6:00-7:00</span>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle" aria-label="Task Options" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#" aria-label="Edit Task">Edit<i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#" aria-label="Delete Task">Delete<i class="fa-solid fa-trash"></i></a>
                            <a href="#" aria-label="Mark Task as Done">Mark as Done<i
                                    class="fa-regular fa-circle-check"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="task-item" role="listitem">
                <label>
                    <input type="checkbox" aria-label="Mark Task as Complete"> Task Name
                </label>
                <div class="time">
                    <span>⏰ 6:00-7:00</span>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle" aria-label="Task Options" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#" aria-label="Edit Task">Edit<i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#" aria-label="Delete Task">Delete<i class="fa-solid fa-trash"></i></a>
                            <a href="#" aria-label="Mark Task as Done">Mark as Done<i
                                    class="fa-regular fa-circle-check"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="task-item" role="listitem">
                <label>
                    <input type="checkbox" aria-label="Mark Task as Complete"> Task Name
                </label>
                <div class="time">
                    <span>⏰ 6:00-7:00</span>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle" aria-label="Task Options" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#" aria-label="Edit Task">Edit<i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#" aria-label="Delete Task">Delete<i class="fa-solid fa-trash"></i></a>
                            <a href="#" aria-label="Mark Task as Done">Mark as Done<i
                                    class="fa-regular fa-circle-check"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <button class="add-task-btn">
            <a href="new-task.html" aria-label="Add Task" type="button"><i class="fa-solid fa-plus"></i><span>Add
                    Task</span> </button>
    </div>

    <script type="module" src="<?= ROOT ?>/assets/js/index.js"></script>
</body>

</html>
