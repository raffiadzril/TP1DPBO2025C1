/* Saya RAFFI ADZRIL ALFAIZ dengan NIM 2308355 kelas C1 mengerjakan evaluasi Latihan Praktikum dalam mata kuliah Desain Pemrograman Berbasis Objek
Materi Kelas Enkapsulasi untuk keberkahanNya maka saya tidak melakukan kecurangan 
seperti yang telah dispesifikasikan. Aamiin. */

public class Petshop { // Mendeklarasikan kelas Petshop
    private int id; // Mendeklarasikan variabel id dengan akses private
    private String nama_produk; // Mendeklarasikan variabel nama_produk dengan akses private
    private String kategori_produk; // Mendeklarasikan variabel kategori_produk dengan akses private
    private float harga_produk; // Mendeklarasikan variabel harga_produk dengan akses private

    public Petshop() { // Konstruktor tanpa parameter
    }

    public Petshop(int id, String nama_produk, String kategori_produk, float harga_produk) { // Konstruktor dengan parameter
        this.id = id; // Menginisialisasi variabel id
        this.nama_produk = nama_produk; // Menginisialisasi variabel nama_produk
        this.kategori_produk = kategori_produk; // Menginisialisasi variabel kategori_produk
        this.harga_produk = harga_produk; // Menginisialisasi variabel harga_produk
    }

    // Getter dan Setter untuk variabel id
    public int getId() {
        return id; // Mengembalikan nilai id
    }

    public void setId(int id) {
        this.id = id; // Mengatur nilai id
    }

    // Getter dan Setter untuk variabel nama_produk
    public String getNama_produk() {
        return nama_produk; // Mengembalikan nilai nama_produk
    }

    public void setNama_produk(String nama_produk) {
        this.nama_produk = nama_produk; // Mengatur nilai nama_produk
    }

    // Getter dan Setter untuk variabel kategori_produk
    public String getKategori_produk() {
        return kategori_produk; // Mengembalikan nilai kategori_produk
    }

    public void setKategori_produk(String kategori_produk) {
        this.kategori_produk = kategori_produk; // Mengatur nilai kategori_produk
    }

    // Getter dan Setter untuk variabel harga_produk
    public float getHarga_produk() {
        return harga_produk; // Mengembalikan nilai harga_produk
    }

    public void setHarga_produk(float harga_produk) {
        this.harga_produk = harga_produk; // Mengatur nilai harga_produk
    }

    // Method untuk menampilkan produk
    public void show_produk() {
        System.out.printf("| %-2d | %-24s | %-25s | %-13.2f |\n", 
            this.id, this.nama_produk, this.kategori_produk, this.harga_produk); // Menampilkan detail produk
    }

    // Method untuk menambahkan atau mengedit produk
    public void add_edit_produk(int id, String nama_produk, String kategori_produk, float harga_produk) {
        this.id = id; // Mengatur nilai id
        this.nama_produk = nama_produk; // Mengatur nilai nama_produk
        this.kategori_produk = kategori_produk; // Mengatur nilai kategori_produk
        this.harga_produk = harga_produk; // Mengatur nilai harga_produk
    }

    // Method untuk mencari produk berdasarkan nama_produk
    int search_produk(String nama_produk) {
        if (this.nama_produk.equals(nama_produk)) { // Membandingkan nama_produk
            return 1; // Mengembalikan nilai 1 jika ditemukan
        } else {
            return 0; // Mengembalikan nilai 0 jika tidak ditemukan
        }
    }
}