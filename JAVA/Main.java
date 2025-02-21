// tes  
import java.util.Scanner; // Mengimpor kelas Scanner untuk input dari pengguna
import java.util.ArrayList; // Mengimpor kelas ArrayList untuk menyimpan daftar produk
import java.util.Iterator; // Mengimpor kelas Iterator untuk iterasi melalui daftar produk

public class Main { // Deklarasi kelas utama
    public static void main(String[] args) { // Metode utama yang dijalankan saat program dimulai
        ArrayList<Petshop> listProduk = new ArrayList<>(); // Membuat ArrayList untuk menyimpan objek Petshop

        // Membuat objek dari class Petshop
        Petshop Zrill_petshop = new Petshop(); // Membuat objek Petshop baru
        Zrill_petshop.setId(1); // Mengatur ID produk
        Zrill_petshop.setNama_produk("Whiskas"); // Mengatur nama produk
        Zrill_petshop.setKategori_produk("Makanan Kucing"); // Mengatur kategori produk
        Zrill_petshop.setHarga_produk(30000); // Mengatur harga produk
        listProduk.add(Zrill_petshop); // Menambahkan produk ke dalam daftar

        Zrill_petshop = new Petshop(2, "Royal Canin", "Makanan Anjing", 75000); // Membuat dan mengatur produk baru
        listProduk.add(Zrill_petshop); // Menambahkan produk ke dalam daftar

        Zrill_petshop = new Petshop(3, "Takari", "Makanan Ikan", 10000); // Membuat dan mengatur produk baru
        listProduk.add(Zrill_petshop); // Menambahkan produk ke dalam daftar

        // Menampilkan menu utama
        System.out.println("=====================================");
        System.out.println("|  Selamat Datang di Zrill Petshop  |");
        System.out.println("=====================================");
        System.out.println("| 1. Menampilkan Produk             |");
        System.out.println("| 2. Menambah Produk                |");
        System.out.println("| 3. Menghapus Produk               |");
        System.out.println("| 4. Mengubah Produk                |");
        System.out.println("| 5. Mencari Produk                 |");
        System.out.println("| 99. Keluar                        |");
        System.out.println("=====================================\n\n");

        Scanner input = new Scanner(System.in); // Membuat objek Scanner untuk input dari pengguna
        int tanda_stop = 0; // Variabel untuk menghentikan loop

        do {
            System.out.print("Masukkan pilihan menu : "); // Meminta input pilihan menu dari pengguna
            int menu_pilihan = 0; // Variabel untuk menyimpan pilihan menu
            try {
                menu_pilihan = input.nextInt(); // Membaca input pilihan menu
                input.nextLine(); // Membersihkan buffer input
            } catch (Exception e) {
                System.out.println("Inputan harus berupa angka"); // Menampilkan pesan kesalahan jika input bukan angka
                input.nextLine(); // Membersihkan buffer input
                continue; // Melanjutkan ke iterasi berikutnya
            }

            if (menu_pilihan == 1) { // Jika pilihan menu adalah 1
                System.out.println("=============================================================================");
                System.out.println("| ID | Nama Produk              | Kategori                  | Harga         |");
                System.out.println("=============================================================================");
                for (Petshop produk : listProduk) { // Iterasi melalui daftar produk
                    produk.show_produk(); // Menampilkan informasi produk
                }
                System.out.println("=============================================================================");
            } else if (menu_pilihan == 2) { // Jika pilihan menu adalah 2
                System.out.println("=============================================================================");
                System.out.println("|  Menambah Produk                                                          |");
                System.out.println("=============================================================================");
                int id_produk = listProduk.size() + 1; // Mengatur ID produk baru
                System.out.print("Masukkan Nama Produk : "); // Meminta input nama produk
                String nama_produk = input.nextLine(); // Membaca input nama produk
                System.out.print("Masukkan Kategori Produk : "); // Meminta input kategori produk
                String kategori_produk = input.nextLine(); // Membaca input kategori produk
                System.out.print("Masukkan Harga Produk : "); // Meminta input harga produk
                float harga_produk = input.nextFloat(); // Membaca input harga produk
                input.nextLine(); // Membersihkan buffer input
                Zrill_petshop = new Petshop(id_produk, nama_produk, kategori_produk, harga_produk); // Membuat produk baru
                listProduk.add(Zrill_petshop); // Menambahkan produk ke dalam daftar
                System.out.println("Produk berhasil ditambahkan"); // Menampilkan pesan sukses
            } else if (menu_pilihan == 3) { // Jika pilihan menu adalah 3
                System.out.println("=============================================================================");
                System.out.println("|  Menghapus Produk                                                         |");
                System.out.println("=============================================================================");
                System.out.print("Masukkan ID Produk yang akan dihapus : "); // Meminta input ID produk yang akan dihapus
                int id_produk = input.nextInt(); // Membaca input ID produk
                input.nextLine(); // Membersihkan buffer input

                Iterator<Petshop> iterasi = listProduk.iterator(); // Membuat iterator untuk daftar produk
                boolean found = false; // Variabel untuk menandai apakah produk ditemukan

                while (iterasi.hasNext() && !found) { // Iterasi melalui daftar produk
                    Petshop produk = iterasi.next(); // Mendapatkan produk berikutnya
                    if (produk.getId() == id_produk) { // Jika ID produk sesuai
                        iterasi.remove(); // Menghapus produk dari daftar
                        found = true; // Menandai bahwa produk ditemukan
                        System.out.println("Produk dengan ID " + id_produk + " dan Nama Produk " + produk.getNama_produk() + " berhasil dihapus"); // Menampilkan pesan sukses
                    }
                }

                if (!found) { // Jika produk tidak ditemukan
                    System.out.println("Produk dengan ID " + id_produk + " tidak ditemukan."); // Menampilkan pesan kesalahan
                }
            } else if (menu_pilihan == 4) { // Jika pilihan menu adalah 4
                System.out.println("=============================================================================");
                System.out.println("|  Mengubah Produk                                                          |");
                System.out.println("=============================================================================");
                System.out.print("Masukkan ID Produk yang akan diubah : "); // Meminta input ID produk yang akan diubah
                int id_produk = input.nextInt(); // Membaca input ID produk
                input.nextLine(); // Membersihkan buffer input

                boolean found = false; // Variabel untuk menandai apakah produk ditemukan

                Iterator<Petshop> iterasi = listProduk.iterator(); // Membuat iterator untuk daftar produk
                while (iterasi.hasNext() && !found) { // Iterasi melalui daftar produk
                    Petshop produk = iterasi.next(); // Mendapatkan produk berikutnya
                    if (produk.getId() == id_produk) { // Jika ID produk sesuai
                        System.out.print("Masukkan Nama Produk : "); // Meminta input nama produk baru
                        String nama_produk = input.nextLine(); // Membaca input nama produk baru
                        System.out.print("Masukkan Kategori Produk : "); // Meminta input kategori produk baru
                        String kategori_produk = input.nextLine(); // Membaca input kategori produk baru
                        System.out.print("Masukkan Harga Produk : "); // Meminta input harga produk baru
                        float harga_produk = input.nextFloat(); // Membaca input harga produk baru
                        input.nextLine(); // Membersihkan buffer input

                        produk.setNama_produk(nama_produk); // Mengatur nama produk baru
                        produk.setKategori_produk(kategori_produk); // Mengatur kategori produk baru
                        produk.setHarga_produk(harga_produk); // Mengatur harga produk baru

                        found = true; // Menandai bahwa produk ditemukan
                        System.out.println("Produk dengan ID " + id_produk + " berhasil diubah"); // Menampilkan pesan sukses
                    }
                }

                if (!found) { // Jika produk tidak ditemukan
                    System.out.println("Produk dengan ID " + id_produk + " tidak ditemukan."); // Menampilkan pesan kesalahan
                }
            } else if (menu_pilihan == 5) { // Jika pilihan menu adalah 5
                System.out.println("=============================================================================");
                System.out.println("|  Mencari Produk                                                           |");
                System.out.println("=============================================================================");
                System.out.print("Masukkan Nama Produk yang akan dicari : "); // Meminta input nama produk yang akan dicari
                String nama_produk = input.nextLine(); // Membaca input nama produk

                System.out.println("=============================================================================");
                System.out.println("| ID | Nama Produk              | Kategori                  | Harga         |");
                System.out.println("=============================================================================");

                boolean found = false; // Variabel untuk menandai apakah produk ditemukan
                for (Petshop produk : listProduk) { // Iterasi melalui daftar produk
                    if (produk.getNama_produk().equalsIgnoreCase(nama_produk)) { // Jika nama produk sesuai
                        produk.show_produk(); // Menampilkan informasi produk
                        found = true; // Menandai bahwa produk ditemukan
                    }
                }

                if (!found) { // Jika produk tidak ditemukan
                    System.out.println("Produk dengan nama " + nama_produk + " tidak ditemukan."); // Menampilkan pesan kesalahan
                }

                System.out.println("=============================================================================");
            } else if (menu_pilihan == 99) { // Jika pilihan menu adalah 99
                tanda_stop = 1; // Mengatur tanda untuk menghentikan loop
                System.out.println("=============================================================================");
                System.out.println("            Terima kasih telah menggunakan aplikasi Zrill Petshop            ");
                System.out.println("=============================================================================");
            } else { // Jika pilihan menu tidak valid
                System.out.println("Menu tidak tersedia"); // Menampilkan pesan kesalahan
            }
        } while (tanda_stop == 0); // Loop berlanjut sampai tanda_stop diatur ke 1

        input.close(); // Menutup objek Scanner
    }
}
