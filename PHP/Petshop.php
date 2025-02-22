<?php

/* Saya RAFFI ADZRIL ALFAIZ dengan NIM 2308355 kelas C1 mengerjakan evaluasi Latihan Praktikum dalam mata kuliah Desain Pemrograman Berbasis Objek
Materi Kelas Enkapsulasi untuk keberkahanNya maka saya tidak melakukan kecurangan 
seperti yang telah dispesifikasikan. Aamiin. */

class Petshop { // Mendeklarasikan kelas Petshop
    private $id; // Mendeklarasikan variabel id dengan akses private
    private $nama_produk; // Mendeklarasikan variabel nama_produk dengan akses private
    private $kategori_produk; // Mendeklarasikan variabel kategori_produk dengan akses private
    private $harga_produk; // Mendeklarasikan variabel harga_produk dengan akses private
    private $foto; // Mendeklarasikan variabel foto dengan akses private

    public function __construct($id = 0, $nama_produk = "", $kategori_produk = "", $harga_produk = 0.0, $foto = "") { // Konstruktor dengan parameter default
        $this->id = $id; // Menginisialisasi variabel id
        $this->nama_produk = $nama_produk; // Menginisialisasi variabel nama_produk
        $this->kategori_produk = $kategori_produk; // Menginisialisasi variabel kategori_produk
        $this->harga_produk = $harga_produk; // Menginisialisasi variabel harga_produk
        $this->foto = $foto; // Menginisialisasi variabel foto
    }

    // Getter dan Setter untuk variabel id
    public function getId() {
        return $this->id; // Mengembalikan nilai id
    }

    public function setId($id) {
        $this->id = $id; // Mengatur nilai id
    }

    // Getter dan Setter untuk variabel nama_produk
    public function getNama_produk() {
        return $this->nama_produk; // Mengembalikan nilai nama_produk
    }

    public function setNama_produk($nama_produk) {
        $this->nama_produk = $nama_produk; // Mengatur nilai nama_produk
    }

    // Getter dan Setter untuk variabel kategori_produk
    public function getKategori_produk() {
        return $this->kategori_produk; // Mengembalikan nilai kategori_produk
    }

    public function setKategori_produk($kategori_produk) {
        $this->kategori_produk = $kategori_produk; // Mengatur nilai kategori_produk
    }

    // Getter dan Setter untuk variabel harga_produk
    public function getHarga_produk() {
        return $this->harga_produk; // Mengembalikan nilai harga_produk
    }

    public function setHarga_produk($harga_produk) {
        $this->harga_produk = $harga_produk; // Mengatur nilai harga_produk
    }

    // Getter dan Setter untuk variabel foto
    public function getFoto() {
        return $this->foto; // Mengembalikan nilai foto
    }

    public function setFoto($foto) {
        $this->foto = $foto; // Mengatur nilai foto
    }

    // Method untuk menampilkan produk
    public function show_produk() {
        printf("| %-2d | %-24s | %-25s | %-13.2f | %-25s |\n", 
            $this->id, $this->nama_produk, $this->kategori_produk, $this->harga_produk, $this->foto); // Menampilkan detail produk
    }

    // Method untuk menambahkan atau mengedit produk
    public function add_edit_produk($id, $nama_produk, $kategori_produk, $harga_produk, $foto) {
        $this->id = $id; // Mengatur nilai id
        $this->nama_produk = $nama_produk; // Mengatur nilai nama_produk
        $this->kategori_produk = $kategori_produk; // Mengatur nilai kategori_produk
        $this->harga_produk = $harga_produk; // Mengatur nilai harga_produk
        $this->foto = $foto; // Mengatur nilai foto
    }

    // Method untuk mencari produk berdasarkan nama_produk
    public function search_produk($nama_produk) {
        if ($this->nama_produk === $nama_produk) { // Membandingkan nama_produk
            return 1; // Mengembalikan nilai 1 jika ditemukan
        } else {
            return 0; // Mengembalikan nilai 0 jika tidak ditemukan
        }
    }
}
