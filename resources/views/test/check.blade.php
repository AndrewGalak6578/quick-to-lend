<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <style>
        /* Custom styles */
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }
        .content-wrapper {
            margin: 20px auto;
            padding: 20px;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 32px;
            font-weight: bold;
        }
        .section {
            margin-bottom: 40px;
        }
        .section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .section label {
            font-size: 18px;
        }
        .btn-save {
            background-color: #F0AD4E;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px;
            font-size: 16px;
        }
        .input-group-text {
            border-radius: 30px;
            border: none;
        }
        .checkbox-container {
            display: flex;
            flex-direction: column;
        }
        .checkbox-container label {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .checkbox-container input {
            margin-right: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .section-wrapper {
            background-color: #fff;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <h1>Настройки</h1>
    <div class="row">
        <div class="col-md-6 section-wrapper">
            <div class="section">
                <h2>Отображать страницы</h2>
                <form>
                    <div class="checkbox-container">
                        <label><input type="checkbox"> Данные</label>
                        <label><input type="checkbox"> Документы и селфи</label>
                        <label><input type="checkbox"> Стейтменты</label>
                    </div>
                    <button type="button" class="btn btn-save mt-3">Сохранить</button>
                </form>
            </div>
        </div>
        <div class="col-md-6 section-wrapper">
            <div class="section">
                <h2>Изменить пароль</h2>
                <form>
                    <div class="form-group">
                        <label for="currentPassword">Текущий пароль</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="currentPassword">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Придумайте пароль</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="newPassword">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Повторите новый пароль</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirmPassword">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-save">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
    <div class="section-wrapper mt-4">
        <div class="section">
            <h2>Получать уведомления в Telegram</h2>
            <form>
                <div class="form-group">
                    <label for="chatId">Chat ID</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="chatId" value="-4201723515">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="botId">Bot ID</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="botId" value="6251119104:AGAEz7R_AfcDWwlBasf42tfwwgCAfGafeETE15q8">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-link"></i></span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-save">Сохранить</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
