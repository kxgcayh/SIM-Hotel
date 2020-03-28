# Cara Kerja Tim di Github

## Push Project di Fork
1. Fork Project, maka repository akan terbuat repository baru di profil github Anda.
2. Buka Halaman Repository hasil Fork, contoh: `https://github.com/muhamadrizkianda/SIM-Hotel`
3. Clone Repository kedalam folder `~/htdocs`:
   1. SSH: `git clone git@github.com:muhamadrizkianda/SIM-Hotel.git` atau
   2. HTTPS: `git clone  https://github.com/muhamadrizkianda/SIM-Hotel.git`
4. Masuk ke folder hasil Clone `cd SIM-HOTEL`
5. Buat branch pada Repository Anda:
   ```sh
   $ git checkout -b 'NAMA_BRANCH'
   ```
6. Mulai penambahan atau perubahan pada Project yang telah di Fork
7. Tambahan, untuk melihat apa saja yang telah dirubah maka jalankan perintah `git status`
8. Tambahkan semua perubahan pada lokal Repository dengan perintah `git add --all`
9. Buat pesan commit untuk Repository anda: 
    ```sh
    $ git commit -m "NAMA_COMMIT"
    ```
10. Push perubahan pada branch yang telah dibuat:
    ```sh
    $ git push origin "NAMA_BRANCH"
    ```
11. Buka Halaman Repository di github, pindah ke branch yang dibuat
12. Lakukan Create Pull Request
13. Pastikan struktur pull request seperti berikut:
    1. base-repository: `kautsaralbana/SIM-Hotel` base: `master` 
    2. head-repository:`muhamadrizkianda/SIM-Hotel` compare: `NAMA_BRANCH`
    
## Pull Project di Fork
Jalankan perintah dibawah ini: [sumber](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/syncing-a-fork).
```sh
$ git fetch upstream
$ git checkout master
$ git merge upstream/master
```
