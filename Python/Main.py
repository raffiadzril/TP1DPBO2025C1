from Petshop import Petshop  # Mengimpor kelas Petshop dari modul Petshop

def main():
    list_produk = []  # Membuat list kosong untuk menyimpan produk

    # Menambahkan objek Petshop ke dalam list
    zrill_petshop = Petshop()  # Membuat objek Petshop
    zrill_petshop.addProduk(1, "Whiskas", "Makanan Kucing", 30000)  # Menambahkan produk ke objek Petshop
    list_produk.append(zrill_petshop)  # Menambahkan objek Petshop ke list

    list_produk.append(Petshop())  # Menambahkan objek Petshop baru ke list
    list_produk[-1].addProduk(2, "Royal Canin", "Makanan Anjing", 75000)  # Menambahkan produk ke objek Petshop terakhir di list

    list_produk.append(Petshop())  # Menambahkan objek Petshop baru ke list
    list_produk[-1].addProduk(3, "Takari", "Makanan Ikan", 10000)  # Menambahkan produk ke objek Petshop terakhir di list

    # Menampilkan menu utama
    print("=" * 37)
    print("|  Selamat Datang di Zrill Petshop  |")
    print("=" * 37)
    print("| 1. Menampilkan Produk             |")
    print("| 2. Menambah Produk                |")
    print("| 3. Menghapus Produk               |")
    print("| 4. Mengubah Produk                |")
    print("| 5. Mencari Produk                 |")
    print("| 99. Keluar                        |")
    print("=" * 37, "\n")
    
    tanda_stop = False  # Inisialisasi tanda untuk menghentikan loop
    while tanda_stop == False:  # Loop utama program
        try:
            menu_pilihan = int(input("Masukkan pilihan menu: "))  # Meminta input pilihan menu dari pengguna
        except ValueError:
            print("Inputan harus berupa angka")  # Menampilkan pesan error jika input bukan angka
            continue

        if menu_pilihan == 1:  # Menampilkan produk
            print("=" * 77)
            print("| ID | Nama Produk              | Kategori                  | Harga         |")
            print("=" * 77)
            for produk in list_produk:  # Loop melalui setiap produk di list
                produk.showProduk()  # Menampilkan produk
            print("=" * 77)

        elif menu_pilihan == 2:  # Menambah produk
            print("=" * 77)
            print("| Menambah Produk" + " " * 59 + "|")
            print("=" * 77)
            id_produk = len(list_produk) + 1  # Menentukan ID produk baru
            nama_produk = input("| Masukkan Nama Produk:" + " " *18 + "| ")  # Meminta input nama produk
            kategori_produk = input("| Masukkan Kategori Produk: " + " " * 13 + "| ")  # Meminta input kategori produk
            harga_produk = float(input("| Masukkan Harga Produk: " + " " * 16 + "| "))  # Meminta input harga produk
            print("=" * 77)
            produk_baru = Petshop()  # Membuat objek Petshop baru
            produk_baru.addProduk(id_produk, nama_produk, kategori_produk, harga_produk)  # Menambahkan produk ke objek Petshop
            list_produk.append(produk_baru)  # Menambahkan objek Petshop ke list
            print("Produk berhasil ditambahkan")

        elif menu_pilihan == 3:  # Menghapus produk
            print("=" * 77)
            print("| Menghapus Produk" + " " * 58 + "|")
            print("=" * 77)
            try:
                id_produk = int(input("| Masukkan ID Produk yang akan dihapus: " + " " * 12 + "| "))  # Meminta input ID produk yang akan dihapus
            except ValueError:
                print("| ID harus berupa angka" + " " * 45 + "|")  # Menampilkan pesan error jika input bukan angka
                continue
            print("-" * 77)
            found = False  # Inisialisasi tanda untuk menemukan produk
            iterasi = 0  # Inisialisasi iterasi
            while iterasi < len(list_produk) and not found:  # Loop melalui setiap produk di list
                if list_produk[iterasi].getId() == id_produk:  # Jika ID produk ditemukan
                    print(f"| Produk dengan ID {list_produk[iterasi].getId()} dengan nama {list_produk[iterasi].getNamaProduk()} berhasil dihapus")
                    list_produk.pop(iterasi)  # Menghapus produk dari list
                    found = True  # Mengubah tanda menjadi true
                iterasi += 1
            if not found:  # Jika produk tidak ditemukan
                print(f"| Produk dengan ID {id_produk} tidak ditemukan.")
            print("=" * 77)

        elif menu_pilihan == 4:  # Mengubah produk
            print("=" * 77)
            print("| Mengubah Produk")
            print("=" * 77)
            try:
                id_produk = int(input("| Masukkan ID Produk yang akan diubah: " + " " * 3 + "| "))  # Meminta input ID produk yang akan diubah
            except ValueError:
                print("| ID harus berupa angka")  # Menampilkan pesan error jika input bukan angka
                continue
            
            found = False  # Inisialisasi tanda untuk menemukan produk
            iterasi = 0  # Inisialisasi iterasi
            while iterasi < len(list_produk) and not found:  # Loop melalui setiap produk di list
                if list_produk[iterasi].getId() == id_produk:  # Jika ID produk ditemukan
                    nama_produk = input("| Masukkan Nama Produk: " + " " * 18 + "| ")  # Meminta input nama produk baru
                    kategori_produk = input("| Masukkan Kategori Produk: " + " " * 14 + "| ")  # Meminta input kategori produk baru
                    harga_produk = float(input("| Masukkan Harga Produk: " + " " * 17 + "| "))  # Meminta input harga produk baru
                    list_produk[iterasi].addProduk(id_produk, nama_produk, kategori_produk, harga_produk)  # Mengubah produk di list
                    print("-" * 77)
                    print("| Produk berhasil diubah")
                    found = True  # Mengubah tanda menjadi true
                iterasi += 1
            if not found:  # Jika produk tidak ditemukan
                print("-" * 77)
                print(f"| Produk dengan ID {id_produk} tidak ditemukan.")
            print("=" * 77)

        elif menu_pilihan == 5:  # Mencari produk
            print("=" * 77)
            print("| Mencari Produk" + " " * 60 + "|")
            print("=" * 77)
            nama_produk = input("| Masukkan Nama Produk yang akan dicari: " + " " * 3 + "| ")  # Meminta input nama produk yang akan dicari
            print("-" * 77 + "\n")
            print("=" * 77)
            print("| ID | Nama Produk              | Kategori                  | Harga         |")
            print("=" * 77)
            found = False  # Inisialisasi tanda untuk menemukan produk
            for produk in list_produk:  # Loop melalui setiap produk di list
                if produk.searchProduk(nama_produk):  # Jika produk ditemukan
                    produk.showProduk()  # Menampilkan produk
                    found = True  # Mengubah tanda menjadi true
            if not found:  # Jika produk tidak ditemukan
                print(f"| Produk dengan nama {nama_produk} tidak ditemukan.")
            print("=" * 77)

        elif menu_pilihan == 99:  # Keluar dari program
            print("=" *77)
            print(" " * 15 + "Terima kasih telah menggunakan Zrill Petshop")
            print("=" *77)
            tanda_stop = True  # Mengubah tanda menjadi true untuk menghentikan loop
        else:
            print("=" *77)
            print(" " * 30 + "Menu tidak tersedia")
            print("=" *77)
        if(menu_pilihan != 99):
            print()

if __name__ == "__main__":
    main()  # Menjalankan fungsi main jika file ini dijalankan sebagai program utama