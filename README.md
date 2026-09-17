# WebsiteAnakKos – Laravel Full + Three.js 3D Website

NamaProyek adalah aplikasi web yang dibangun dengan **Laravel Full-Stack** (Blade + Vite) dan **Three.js** untuk tampilan 3D interaktif. Tidak ada API terpisah — data dari backend disuntikkan langsung ke frontend melalui Blade.

---

## 🚀 Features

- ✅ Laravel 10+
- 🎨 Tailwind CSS untuk styling
- ⚡ Vite sebagai build tool
- 🧠 TypeScript untuk logika frontend
- 🧊 Three.js untuk rendering 3D interaktif
- 🛠 Blade sebagai template engine (tanpa API terpisah)
- 🐞 Laravel Debugbar untuk inspeksi development

---

## 🛠 Development Setup

### 1. Clone the Repo

```bash
git clone https://github.com/username/nama-proyek.git
cd nama-proyek
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Copy & Edit Environment File

```bash
cp .env.example .env
```

Edit `.env` dan sesuaikan kredensial database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_proyek
DB_USERNAME=laravel
DB_PASSWORD=secret
```

Pastikan juga:

```env
APP_URL=http://127.0.0.1:8000
VITE_APP_URL=http://127.0.0.1:8000
```

### 5. Generate App Key

```bash
php artisan key:generate
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. (Opsional) Seed Data Awal

```bash
php artisan db:seed
```

---

### 8. Start Development Servers

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev

# Terminal 3
composer run dev
```
