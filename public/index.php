<?php
// масив для нового робітника
$newWorker = [];
// масив для помилок валідації
$creationErrors = [];

// створення підключення до бази даних
$db = mysqli_connect("localhost", "root", "", "php_web_development");

// код додавання робітника до бази данних (крок 1)
// todo: replace it by step-1.txt content

// код видалення робітника з бази даних (крок 2)
// todo: replace it by step-2.txt content

?>

<!DOCTYPE html>
<html lang="ua">

<head>
    <!-- Заголовок документу -->
    <title>Розробка з PHP</title>
    <!-- Завантаження стилів -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="heading">
        <h2>Перелік робітників</h2>
    </div>
    <!-- Ми створюєму форму вказуючи метод та щлях сценарію яким вона має оброблятися -->
    <form method="post" action="index.php" autocomplete="off">

        <div class="input-group">
            <label for="first_name">Ім'я:</label>
            <!-- Заповнюємо значення поля якщо воно існує у масиві для нового робітника -->
            <input
                id="first_name"
                type="text"
                name="worker_first_name"
                autocomplete="no"
                value="<?php echo isset($newWorker['worker_first_name']) ? $newWorker['worker_first_name'] : null ?>"
            />
            <?php if (isset($creationErrors['worker_first_name'])) { ?>
            <span style="color: red">Це поле не має бути пустим!</span>
            <?php } ?>
        </div>

        <div class="input-group">
            <label for="last_name">Прізвище:</label>
            <input
                id="last_name"
                type="text"
                name="worker_last_name"
                autocomplete="no"
                value="<?php echo isset($newWorker['worker_last_name']) ? $newWorker['worker_last_name'] : null ?>"
            />
            <?php if (isset($creationErrors['worker_last_name'])) { ?>
            <span style="color: red">Це поле не має бути пустим!</span>
            <?php } ?>
        </div>

        <div class="input-group">
            <label for="email">Електронна пошта:</label>
            <input
                id="email"
                type="text"
                name="worker_email"
                autocomplete="no"
                value="<?php echo isset($newWorker['worker_email']) ? $newWorker['worker_email'] : null ?>"
            />
            <?php if (isset($creationErrors['worker_email'])) { ?>
            <span style="color: red">Це поле не має бути пустим!</span>
            <?php } ?>
        </div>

        <div class="input-group">
            <label for="phone">Телефон:</label>
            <input
                id="phone"
                type="text"
                name="worker_phone"
                autocomplete="no"
                value="<?php echo isset($newWorker['worker_phone']) ? $newWorker['worker_phone'] : null ?>"
            />
            <?php if (isset($creationErrors['worker_phone'])) { ?>
            <span style="color: red">Це поле не має бути пустим!</span>
            <?php } ?>
        </div>
        <!-- Кнопка відправки форми створення нового робітника -->
        <button type="submit" name="submit">Додати</button>
    </form>

    <div>
    <!-- Ми робимо запит з бази даних всіх існуючих робітників -->
    <?php $workers = mysqli_query($db, "SELECT * FROM workers"); ?>
    <!-- Якщо кількість записів перевищує 0 то буде відображатися таблиця з даними робітників -->
    <?php if ($workers->num_rows > 0) { ?>
        <table class="workers">
            <!-- Заголовок таблиці -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ім'я</th>
                    <th>Прізвище</th>
                    <th>Електронна пошта</th>
                    <th>Телефон</th>
                    <th style="width: 60px;"></th>
                </tr>
            </thead>
            <!-- Тіло таблиці -->
            <tbody>
            <!-- Ми йдемо циклом по всім робітникам та створюємо розмітку з даними для кожного з них -->
            <?php while ($worker = $workers->fetch_assoc()) { ?>
                <tr>
                    <td> <?php echo $worker['id']; ?> </td>
                    <td> <?php echo $worker['first_name']; ?> </td>
                    <td> <?php echo $worker['last_name']; ?> </td>
                    <td> <?php echo $worker['email']; ?> </td>
                    <td> <?php echo $worker['phone']; ?> </td>
                    <td>
                        <!-- Ми створюємо посилання перехід за яким видаляє робітника з бази даних -->
                        <a href="index.php?remove_worker=<?php echo $worker['id'] ?>">Видалити</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    </div>

</body>
</html>