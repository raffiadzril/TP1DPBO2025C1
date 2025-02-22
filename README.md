# **LP1DPBO2025C1**

## **Latihan Praktikum Desain Pemrograman Berbasis Objek 2025**
**Kelas C1 - Ilmu Komputer - Universitas Pendidikan Indonesia**

---

## **Janji**
Saya, **Raffi Adzril Alfaiz** dengan **NIM 2308355**, mengerjakan **Latihan Praktikum 1** dalam mata kuliah **Desain dan Pemrograman Berorientasi Objek** untuk keberkahan-Nya. Maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. **Aamiin.**

---

## **Dokumentasi**

### **1. Output Program untuk Show, Add, dan Delete**  
![Show, Add, Delete](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/CPP/DOKUMENTASI/ADD_SHOW_DELETE.png)  

### **2. Output Program untuk Delete dan Search by nama_produk**  
![Delete & Search](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/CPP/DOKUMENTASI/EDIT_SEARCH.png)  

---

## **Alur Kode secara Keseluruhan**

### **1. Deklarasi Kelas `Petshop`**

#### **Atribut Private:**
- `id` → Menyimpan ID produk.
- `nama_produk` → Menyimpan nama produk.
- `kategori_produk` → Menyimpan kategori produk.
- `harga_produk` → Menyimpan harga produk.

#### **Konstruktor:**
- Tanpa parameter (default).
- Dengan parameter untuk inisialisasi langsung.

#### **Getter & Setter:**
- Digunakan untuk mengakses dan mengubah data produk dengan aman.

#### **Method Utama:**
- `show_produk()` → Menampilkan detail produk dalam format tabel.
- `add_edit_produk()` → Menambahkan atau mengedit produk berdasarkan parameter baru.
- `search_produk()` → Mencari produk berdasarkan `nama_produk` dan mengembalikan status:
  - `1` → Jika produk ditemukan.
  - `0` → Jika produk tidak ditemukan.

---

### **2. Kelas `Main`**

#### **Inisialisasi**
- Menggunakan `ArrayList<Petshop>` untuk menyimpan daftar produk.
- Beberapa produk awal ditambahkan menggunakan setter dan konstruktor.

#### **Menu Utama**
Menampilkan opsi berikut:
1. Lihat produk.
2. Tambah produk.
3. Hapus produk.
4. Ubah produk.
5. Cari produk.
6. Keluar.

#### **Looping Menu dengan `Scanner`**
Program meminta input pengguna dan menjalankan fitur berdasarkan pilihan:

- **Menampilkan Produk** → Iterasi daftar produk dan memanggil `show_produk()`.
- **Menambah Produk** → Meminta input pengguna dan menambahkannya ke daftar.
- **Menghapus Produk**:
  - Input **ID produk**.
  - Menggunakan **Iterator** untuk menemukan dan menghapus produk.
- **Mengubah Produk**:
  - Input **ID produk**, jika ditemukan, perbarui datanya.
- **Mencari Produk**:
  - Input **nama produk**, gunakan `search_produk()` untuk mencocokkan.

#### **Validasi Input**
- Menggunakan **try-catch** untuk menangani input non-numerik pada pilihan menu.

#### **Program Berhenti jika User Memilih `99`**
- Loop akan terus berjalan hingga pengguna memasukkan **99**.

---

