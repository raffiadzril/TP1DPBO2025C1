/* Saya RAFFI ADZRIL ALFAIZ dengan NIM 2308355 kelas C1 mengerjakan evaluasi Latihan Praktikum dalam mata kuliah Desain Pemrograman Berbasis Objek
Materi Kelas Enkapsulasi untuk keberkahanNya maka saya tidak melakukan kecurangan 
seperti yang telah dispesifikasikan. Aamiin. */

#include <iostream>
#include <string>

using namespace std;

class Petshop{  // Kelas Petshop
    // Private tipe data kelas Petshop
    private:
        int id;
        string nama_produk;
        string kategori_produk;
        float harga_produk;

    public:
        Petshop(){  // Konstruktor
            this->id = 0;
            this->nama_produk = "";
            this->kategori_produk = "";
            this->harga_produk = 0;
        }

        Petshop(int id, string nama_produk, string kategori_produk, float harga_produk){    // Konstruktor dengan parameter
            this->id = id;
            this->nama_produk = nama_produk;
            this->kategori_produk = kategori_produk;
            this->harga_produk = harga_produk;
        }
        // Getter dan Setter
        int get_id(){   
            return this->id;
        }

        void set_id(int id){
            this->id = id;
        }

        string get_nama_produk(){
            return this->nama_produk;
        }

        void set_nama_produk(string nama_produk){
            this->nama_produk = nama_produk;
        }

        string get_kategori_produk(){
            return this->kategori_produk;
        }

        void set_kategori_produk(string kategori_produk){
            this->kategori_produk = kategori_produk;
        }

        float get_harga_produk(){
            return this->harga_produk;
        }

        void set_harga_produk(float harga_produk){
            this->harga_produk = harga_produk;
        }

        // Fungsi untuk menambah atau mengubah data produk
        void add_edit_produk(int id, string nama_produk, string kategori_produk, float harga_produk){
            this->id = id;
            this->nama_produk = nama_produk;
            this->kategori_produk = kategori_produk;
            this->harga_produk = harga_produk;
        }
        // Fungsi untuk menampilkan data produk
        void show_produk(){
            cout << "ID Produk: " << this->id << endl;
            cout << "Nama Produk: " << this->nama_produk << endl;
            cout << "Kategori Produk: " << this->kategori_produk << endl;
            cout << "Harga Produk: " << this->harga_produk << endl;
        }
        // Fungsi untuk mencari produk
        int search_produk(string nama_produk){
            if(this->nama_produk == nama_produk){   // Jika nama produk sama dengan nama produk yang dicari
                return 1;
            }
            else{
                return 0;
            }
        }
        ~Petshop(){}

};