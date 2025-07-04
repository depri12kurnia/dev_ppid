<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Lacak Permohonan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #1f2a48;
            height: 100vh;
            background-image: radial-gradient(circle at 20% 40%, rgba(255, 255, 255, 0.03) 20%, transparent 20%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.03) 20%, transparent 20%);
            background-size: 500px 500px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .logo {
            max-width: 150px;
            margin: 0 auto 1rem auto;
        }

        .card p {
            font-size: 0.95rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .btn-submit {
            background: linear-gradient(90deg, #4f80ff, #4f46e5);
            color: #fff;
            border: none;
            padding: 0.75rem;
            border-radius: 999px;
            width: 100%;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: box-shadow 0.3s ease;
        }

        .btn-submit:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 500px) {
            .card {
                margin: 0 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="card">
        <img src="https://ppid.unpad.ac.id/apps/assets/img/logo-unpad.png" alt="Logo Unpad" class="logo">
        <p>Masukkan Nomor Permohonan/Pengaduan</p>
        <form>
            <input type="text" class="form-input" placeholder="Contoh: 20250703-00001" required>
            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</body>

</html>