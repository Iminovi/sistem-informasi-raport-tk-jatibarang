<?php
// app/Helpers/rapor_helper.php

if (!function_exists('get_deskripsi')) {
    function get_deskripsi($aspek, $nilai, $nama) {
        // Konversi ke huruf besar agar sinkron dengan key array
        $nilai = strtoupper($nilai); 

        $narasi = [
            'nilai_aik' => [
                'A' => "Perkembangan kemampuan Ananda $nama dalam pembelajaran Al-Islam sangat baik dan berkembang melampaui harapan. Mampu membaca doa, mengenal lambang Muhammadiyah/Aisyiyah, dan menghafal surat pendek dengan mandiri.  ",
                'B' => "Perkembangan kemampuan Ananda $nama dalam pembelajaran Al-Islam berkembang sesuai harapan. Sudah mampu membaca doa dan mengenal lambang organisasi melalui foto.  ",
                'C' => "Perkembangan kemampuan Ananda $nama cukup berkembang, namun masih membutuhkan bimbingan rutin.  ",
                'D' => "Perkembangan kemampuan Ananda $nama masih memerlukan bimbingan lebih lanjut.  "
            ],
            'nilai_cpabp' => [
                'A' => "Perkembangan nilai agama dan budi pekerti Ananda $nama sangat baik. Ananda mampu mengenali berbagai benda ciptaan Allah SWT seperti tumbuhan, hewan, dan manusia.  ",
                'B' => "Perkembangan nilai agama dan budi pekerti Ananda $nama berkembang sesuai harapan.  ",
                'C' => "Ananda $nama mulai berkembang dalam memahami nilai agama namun masih butuh bimbingan.  ",
                'D' => "Ananda $nama memerlukan bimbingan intensif dalam pengenalan nilai agama dasar.  "
            ],
            // Pastikan nilai_cpjd, nilai_cpdl, dan nilai_p5 juga terisi lengkap  
            'nilai_cpjd' => [
                'A' => "Alhamdulillah, Ananda $nama menunjukkan perkembangan sangat baik dalam menjaga kebersihan diri dan kesehatan.  ",
                'B' => "Ananda $nama menunjukkan perkembangan baik dalam menjaga kebersihan diri.  ",
                'C' => "Ananda $nama mulai berkembang dalam menjaga kebersihan diri dengan bantuan guru.  ",
                'D' => "Ananda $nama memerlukan pendampingan dalam membiasakan hidup sehat.  "
            ],
            'nilai_cpdl' => [
                'A' => "Perkembangan literasi dan matematika Ananda $nama sangat baik dan berkembang dengan optimal.  ",
                'B' => "Perkembangan literasi dan matematika Ananda $nama berkembang sesuai harapan.  ",
                'C' => "Ananda $nama mulai berkembang dalam mengenal angka dan huruf.  ",
                'D' => "Ananda $nama masih membutuhkan bimbingan lebih lanjut dalam dasar literasi.  "
            ],
            'nilai_p5' => [
                'A' => "Perkembangan P5 Ananda $nama sangat baik. Aktif dalam bermain peran pasar-pasaran dan mampu bekerja sama.  ",
                'B' => "Perkembangan P5 Ananda $nama berkembang sesuai harapan dalam berinteraksi sosial.  ",
                'C' => "Ananda $nama mulai terlibat dalam kerja kelompok projek namun masih malu-malu.  ",
                'D' => "Ananda $nama perlu bimbingan untuk aktif dalam kegiatan kelompok projek. "
            ]
        ];

        return $narasi[$aspek][$nilai] ?? "Data penilaian (opsi $nilai) belum tersedia.";
    }
}