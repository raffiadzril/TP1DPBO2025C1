# **TP1DPBO2025C1**  
Tugas dan Latihan Praktikum Desain Pemrograman Berbasis Objek tahun 2025 Kelas C1 - Ilmu Komputer - Universitas Pendidikan Indonesia  

## **Janji**  
Saya **Raffi Adzril Alfaiz** dengan **NIM 2308355** mengerjakan Latihan Praktikum 1 dalam mata kuliah **Desain dan Pemrograman Berorientasi Objek** untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. **Aamiin.**  

---

## **Dokumentasi**  

### **1. C++**  
#### **Output Program untuk Show, Add, dan Delete**  
![Show, Add, Delete - C++](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/CPP/DOKUMENTASI/ADD_SHOW_DELETE.png)  

#### **Output Program untuk Delete dan Search by nama_produk**  
![Delete & Search - C++](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/CPP/DOKUMENTASI/EDIT_SEARCH.png)  

---

### **2. Java**  
#### **Output Program untuk Show, Add, dan Delete**  
![Show, Add, Delete - Java](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/JAVA/DOKUMENTASI/show.png)  
![Show, Add, Delete - Java](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/JAVA/DOKUMENTASI/add_delete.png)  

#### **Output Program untuk Delete dan Search by nama_produk**  
![Delete & Search - Java](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/JAVA/DOKUMENTASI/edit_search.png)  

---

### **3. Python**  
#### **Output Program untuk Show, Add, dan Delete**  
![Show, Add- Python](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/Python/DOKUMENTASI/show_add.png)  

#### **Output Program untuk Delete dan Edit by nama_produk**  
![Delete & Edit - Python](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/Python/DOKUMENTASI/delete_edit.png)

#### **Output Program untuk Delete dan Edit by nama_produk**  
![Search - Python](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/Python/DOKUMENTASI/search.png)  

---

### **4. PHP**  
#### **Output Program untuk Show Daftar Awal Program**  
![Show 1- PHP](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/PHP/DOKUMENTASI/DaftarProduk_init.png)  

#### **Output Program untuk Add Produk**  
![Add - PHP](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/PHP/DOKUMENTASI/Add_produk.png)  

#### **Output Program untuk Hasil Add Produk**  
![Show 2 - PHP](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/PHP/DOKUMENTASI/DaftarProduk_hasilAdd.png)  

#### **Output Program untuk Edit Produk**  
![Edit - PHP](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/PHP/DOKUMENTASI/Edit_produk.png)  

#### **Output Program untuk Hasil Edit Produk**  
![Show 3 - PHP](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/PHP/DOKUMENTASI/DaftarProduk_HasilEdit.png)  

#### **Output Program untuk Hasil Hapus Produk**  
![Show 4 - PHP](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/PHP/DOKUMENTASI/hapus.png)  

#### **Output Program untuk Hasil Search Produk**  
![Search - PHP](https://github.com/raffiadzril/LP1DPBO2025C1/blob/main/PHP/DOKUMENTASI/SearchProduk.png)
 

---

## **Alur Kode contoh dalam Bahasa Java**  

### **1. Deklarasi Kelas Petshop**  
- **Variabel Private:** `id`, `nama_produk`, `kategori_produk`, `harga_produk` untuk menyimpan informasi produk.  
- **Konstruktor:**  
  - Tanpa parameter (default).  
  - Dengan parameter untuk inisialisasi langsung.  
- **Getter & Setter:** Mengakses dan mengubah data produk secara aman.  
- **Method Utama:**  
  - `show_produk()`: Menampilkan detail produk dalam format tabel.  
  - `add_edit_produk()`: Menambahkan atau mengedit produk dengan parameter baru.  
  - `search_produk()`: Mencari produk berdasarkan nama dan mengembalikan status (1 jika ditemukan, 0 jika tidak).  

### **2. Kelas Main**  
#### **Inisialisasi**  
- **ArrayList** (`vector` di C++, `ArrayList` di Java, `list` di Python, dan `array` di PHP) digunakan untuk menyimpan daftar produk.  
- Beberapa produk awal ditambahkan menggunakan setter dan konstruktor.  

#### **Menu Utama**  
- Menampilkan opsi:  
  1. Lihat produk  
  2. Tambah produk  
  3. Hapus produk  
  4. Ubah produk  
  5. Cari produk  
  6. Keluar  

#### **Looping Menu dengan Input User**  
- Meminta input pengguna dan menjalankan fitur berdasarkan pilihan:  
  - **Menampilkan Produk:** Iterasi daftar produk dan memanggil `show_produk()`.  
  - **Menambah Produk:** Meminta input dari pengguna dan menambahkannya ke daftar.  
  - **Menghapus Produk:**  
    - Input ID produk.  
    - Menggunakan `Iterator` (`for-loop` di Python & PHP) untuk menemukan dan menghapus produk.  
  - **Mengubah Produk:**  
    - Input ID produk, jika ditemukan, perbarui datanya.  
  - **Mencari Produk:**  
    - Input nama produk, gunakan `search_produk()` untuk mencocokkan.  

#### **Validasi Input**  
- **Try-catch** untuk menangani input non-numerik pada pilihan menu.  

#### **Program Berhenti jika User Memilih 99**  
- Loop akan terus berjalan hingga pengguna memasukkan `99`.  

---

