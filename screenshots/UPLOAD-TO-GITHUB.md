# 📸 Panduan Menambahkan Screenshot ke GitHub

## Masalah: Foto Tidak Muncul di GitHub

Jika screenshot disimpan di folder `public/storage/screenshots/`, foto **tidak akan muncul** di GitHub README karena:

1. Folder `public/storage` biasanya ada di `.gitignore` (untuk keamanan)
2. GitHub tidak bisa mengakses path `/storage/` yang merupakan path lokal
3. File gambar besar dapat membuat repository menjadi besar

## Solusi 1: Pindahkan Folder Screenshots (Recommended)

### Langkah 1: Pindahkan folder screenshots ke root project

```bash
# Pindahkan folder dari public/storage ke root
mv public/storage/screenshots ./screenshots
```

### Langkah 2: Update path di README.md

Ganti semua:
```markdown
![Login](/storage/screenshots/01-authentication/login.png)
```

Menjadi:
```markdown
![Login](screenshots/01-authentication/login.png)
```

### Langkah 3: Tambahkan screenshot ke git

```bash
# Tambahkan folder screenshots
git add screenshots/

# Commit
git commit -m "docs: Add application screenshots"

# Push (mungkin perlu --force jika file besar)
git push origin main
```

### Langkah 4: Update .gitignore (Optional)

Jika folder `public/storage` ada di `.gitignore`, hapus atau modify:

```gitignore
# Hapus atau comment baris ini:
# public/storage/*

# Atau tambahkan exception:
!public/storage/screenshots/
```

---

## Solusi 2: Upload Screenshot ke External Hosting

Jika file screenshot terlalu besar untuk GitHub, upload ke:

### Option A: Imgur
1. Upload ke https://imgur.com/upload
2. Copy direct link
3. Gunakan di README:
   ```markdown
   ![Login](https://i.imgur.com/your-image.png)
   ```

### Option B: Cloudinary
1. Upload ke https://cloudinary.com/
2. Copy URL
3. Gunakan di README

### Option C: Google Drive / Dropbox
1. Upload ke Google Drive / Dropbox
2. Set permission ke "Anyone with link can view"
3. Copy direct link
4. Gunakan di README

---

## Solusi 3: Compress Screenshot

Jika file terlalu besar (>1MB per file):

### Tools Compress:
- **TinyPNG** - https://tinypng.com/ (free, up to 20 images)
- **Squoosh** - https://squoosh.app/ (online, real-time)
- **ImageOptim** - macOS app
- **Caesium** - Windows/Linux app

### Command Line (Linux/Mac):
```bash
# Install pngquant
sudo apt install pngquant  # Linux
brew install pngquant      # macOS

# Compress semua PNG
pngquant --quality=65-80 --ext .png --force screenshots/**/*.png
```

---

## Cara Push Screenshot ke GitHub

### 1. Cek file size
```bash
# Lihat ukuran folder screenshots
du -sh screenshots/
```

### 2. Jika < 50MB (aman)
```bash
git add screenshots/
git commit -m "docs: Add application screenshots"
git push origin main
```

### 3. Jika > 50MB (perlu compress)
```bash
# Compress dulu
# ... gunakan tools di atas ...

# Lalu commit
git add screenshots/
git commit -m "docs: Add compressed screenshots"
git push origin main
```

### 4. Jika tetap gagal (file too large)
```bash
# Gunakan Git LFS (Large File Storage)
git lfs install
git lfs track "screenshots/*.png"
git add .gitattributes screenshots/
git commit -m "docs: Add screenshots with LFS"
git push origin main
```

---

## Checklist

- [ ] Pindahkan folder screenshots ke root project
- [ ] Update semua path di README.md
- [ ] Compress gambar jika > 1MB per file
- [ ] Add ke git: `git add screenshots/`
- [ ] Commit: `git commit -m "docs: Add screenshots"`
- [ ] Push: `git push origin main`
- [ ] Verify di GitHub README

---

## Tips

1. **Screenshot size ideal**: < 500KB per file
2. **Format**: PNG untuk quality, JPG untuk smaller size
3. **Resolution**: Max 1920x1080 untuk desktop
4. **Naming**: lowercase dengan dash (login.png, product-detail.png)
5. **Folder structure**: Organized by feature/category
