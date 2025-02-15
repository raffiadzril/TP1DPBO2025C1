/* Saya RAFFI ADZRIL ALFAIZ dengan NIM 2308355 kelas C1 mengerjakan evaluasi Latihan Praktikum dalam mata kuliah Desain Pemrograman Berbasis Objek
Materi Kelas Enkapsulasi untuk keberkahanNya maka saya tidak melakukan kecurangan 
seperti yang telah dispesifikasikan. Aamiin. */

#include "Petshop.cpp"
#include <iostream>
#include <string>
#include <list>

using namespace std;

int main(){
    list<Petshop> list_produk_petshop;  // Membuat list produk petshop
    Petshop Zrill_petshop;  // Membuat objek Zrill_petshop dari kelas Petshop

    // Menambahkan produk ke list data dummy
    Zrill_petshop.set_id(1);    // Mengatur id produk
    Zrill_petshop.set_nama_produk("Whiskas");   // Mengatur nama produk
    Zrill_petshop.set_kategori_produk("Makanan_Kucing");    // Mengatur kategori produk
    Zrill_petshop.set_harga_produk(30000);  // Mengatur harga produk
    list_produk_petshop.push_back(Zrill_petshop);   // Menambahkan produk ke list

    Zrill_petshop.set_id(2);    
    Zrill_petshop.set_nama_produk("Friskies");
    Zrill_petshop.set_kategori_produk("Makanan_Kucing");
    Zrill_petshop.set_harga_produk(40000);
    list_produk_petshop.push_back(Zrill_petshop);

    int menu_pilihan = 0;   // Variabel untuk menyimpan pilihan menu
    // Menampilkan menu
    cout << "==================================" << endl;
    cout << "Selamat datang di Zrill Petshop" << endl;
    cout << "==================================" << endl;
    cout << "1. Tampilkan Produk" << endl;
    cout << "2. Tambah Produk" << endl;
    cout << "3. Hapus Produk" << endl;
    cout << "4. Ubah Produk" << endl;
    cout << "5. Cari Produk" << endl;
    cout << "99. Keluar" << endl;   
    cout << "==================================" << endl;
    int tanda_stop = 0; // Variabel untuk menandakan berhenti atau tidaknya program saat meminta input
    do{
        cout << "Masukkan pilihan: ";       // Meminta input pilihan menu
        cin >> menu_pilihan;    // Meminta Input
        if(cin.fail()){ // Jika inputan bukan angka program akan berhenti
            cout << "Inputan harus berupa angka" << endl;
            return 1;
        }
        else if((menu_pilihan > 5 && menu_pilihan != 99) || (menu_pilihan < 1)){    // Jika inputan tidak sesuai dengan menu program akan berhenti
            cout << "Pilihan tidak tersedia" << endl;
            return 1;
        }
        if(menu_pilihan == 1){  // Jika pilihan menu adalah 1
            for(list<Petshop>::iterator it = list_produk_petshop.begin(); it != list_produk_petshop.end(); it++){   // Looping untuk menampilkan produk
                it->show_produk();  // Menampilkan produk
                cout << "==================================" << endl;
            }
        }
        else if(menu_pilihan == 2){ // Jika pilihan menu adalah 2
            int id_produk;  // Variabel untuk menyimpan id produk
            string nama_produk; // Variabel untuk menyimpan nama produk
            string kategori_produk; // Variabel untuk menyimpan kategori produk
            float harga_produk; // Variabel untuk menyimpan harga produk
            id_produk = list_produk_petshop.size() + 1; // Mengatur id produk agar auto increment
            // Meminta input nama produk, kategori produk, dan harga produk
            cout << "Masukkan Nama Produk: ";
            cin >> nama_produk;
            cout << "Masukkan Kategori Produk: ";
            cin >> kategori_produk;
            cout << "Masukkan Harga Produk: ";
            cin >> harga_produk;
            Zrill_petshop.add_edit_produk(id_produk, nama_produk, kategori_produk, harga_produk);   // Menambahkan produk
            list_produk_petshop.push_back(Zrill_petshop);   // Menambahkan produk ke list
        }
        else if(menu_pilihan == 3){
            int id_produk;  // Variabel untuk menyimpan id produk
            // Meminta input id produk yang ingin dihapus
            cout << "Masukkan ID Produk yang ingin dihapus: ";  
            cin >> id_produk;
            list<Petshop>::iterator it = list_produk_petshop.begin();   // Iterator untuk list produk
            int flag = 0;   // Variabel untuk menandakan produk ditemukan atau tidak
            while(it != list_produk_petshop.end() && flag == 0){    // Looping untuk mencari produk
                if(it->get_id() == id_produk){
                    it = list_produk_petshop.erase(it);
                    for(list<Petshop>::iterator iterate_hapus = it; iterate_hapus != list_produk_petshop.end(); iterate_hapus++){
                        iterate_hapus->set_id(iterate_hapus->get_id() - 1);
                    }
                    flag = 1;
                }
                else{
                    it++;
                }
            }
        }
        else if(menu_pilihan == 4){ // Jika pilihan menu adalah 4
            int id_produk;  // Variabel untuk menyimpan id produk
            cout << "Masukkan ID Produk yang ingin diubah: ";
            cin >> id_produk;
            list<Petshop>::iterator it = list_produk_petshop.begin();   // Iterator untuk list produk
            int flag = 0;
            while(it != list_produk_petshop.end() && flag == 0){    // Looping untuk mencari produk
                if(it->get_id() == id_produk){  // Jika produk ditemukan
                    int id_produk_new;  // Variabel untuk menyimpan id produk baru
                    string nama_produk;     // Variabel untuk menyimpan nama produk baru
                    string kategori_produk; // Variabel untuk menyimpan kategori produk baru
                    float harga_produk;    // Variabel untuk menyimpan harga produk baru
                    id_produk_new = it->get_id();   // Mengatur id produk baru
                    // Meminta input nama produk, kategori produk, dan harga produk baru
                    cout << "Masukkan Nama Produk: ";   
                    cin >> nama_produk;
                    cout << "Masukkan Kategori Produk: ";
                    cin >> kategori_produk;
                    cout << "Masukkan Harga Produk: ";
                    cin >> harga_produk;
                    // Menimpan data produk baru
                    it->add_edit_produk(id_produk_new, nama_produk, kategori_produk, harga_produk);
                    flag = 1;   // Menandakan produk ditemukan
                }
                it++;  // Iterator berpindah ke produk selanjutnya
            }
        }
        else if(menu_pilihan == 5){ // Jika pilihan menu adalah 5
            string nama_produk; // Variabel untuk menyimpan nama produk yang dicari
            cout << "Masukkan Nama Produk yang ingin dicari: ";   // Meminta input nama produk yang dicari
            cin >> nama_produk; // Meminta input
            // Looping untuk mencari produk
            list<Petshop>::iterator it = list_produk_petshop.begin();
            int flag = 0;   // Variabel untuk menandakan produk ditemukan atau tidak
            while(it != list_produk_petshop.end() && flag == 0){    // Looping untuk mencari produk
                if(it->search_produk(nama_produk) == 1){    // Jika produk ditemukan
                    // Menampilkan data produk
                    cout << "ID Produk: " << it->get_id() << endl;  
                    cout << "Nama Produk: " << it->get_nama_produk() << endl;
                    cout << "Kategori Produk: " << it->get_kategori_produk() << endl;
                    cout << "Harga Produk: " << it->get_harga_produk() << endl;
                    flag = 1;   // Menandakan produk ditemukan
                }
                it++;   // Iterator berpindah ke produk selanjutnya
            }
        }
        else if(menu_pilihan == 99){    // Jika pilihan menu adalah 99
            tanda_stop = 1; // Menandakan program berhenti
            cout << "Terima kasih telah menggunakan layanan Zrill Petshop" << endl;
        }
    }while(tanda_stop == 0);    // Looping menu    
    
    return 0;
}
