<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'nama' => 'S1 INFORMATIKA',
                'intro' => "Informatika merupakan salah satu core technology dalam sistem teknologi yang dikenal sebagai Teknologi Informasi dan Komunikasi (Information and Communication Technology), karena melalui pemfungsian Informatika-lah diperoleh produk-produk perangkat lunak (software products) yang memungkinkan terwujudnya sifat intelligent dari Teknologi Informasi dan Komunikasi. Teknologi Informasi dan Komunikasi merupakan strategic enabling technology dalam menopang upaya pencerdasan kehidupan bangsa, dalam aktivitas berbisnis, berindustri, berorganisasi, berfungsinya pemerintahan, pertahanan Negara, dan dalam memfasilitasi kemudahan-kemudahan masyarakat luas dalam tata kehidupan sehari-harinya.
Program Studi S1 Informatika (PSIF) di Institut Teknologi Del (IT Del) memiliki cakupan bidang ilmu (body of knowledge) meliputi area ilmu komputer (Computer Science), rekayasa perangkat lunak (Software Engineering), keamanan siber (Cybersecurity), dan ilmu data (Data Science). Lulusan dari PSIF dipersiapkan untuk dapat memiliki kemampuan analisis persoalan yang terkait bidang computer science dan pengembangan perangkat lunak mulai dari yang sederhana yang sampai yang kompleks ataupun berskala besar. Selain itu, lulusan PSIF juga dipersiapkan memiliki kemampuan untuk merancang dan mengimplementasikan keamanan yang diperlukan pada suatu perangkat lunak. Dan, terakhir, seorang lulusan PSSTI diproyeksikan untuk memiliki kemampuan mengembangkan perangkat lunak yang pintar menggunakan sejumlah teknik kecerdasan buatan dan secara khusus memiliki kemampuan untuk menjadi artificial intelligence engineer.",
                'visi' => "Menjadi program Teknik Informatika yang unggul yang berperan dalam menghasilkan dan memanfaatkan teknologi untuk mengembangkan potensi lokal bagi kemajuan bangsa.",
                'misi' => "1. Menyelenggarakan pendidikan teknik informatika yang bermutu, profesional dan diperhitungkan secara nasional.\n2. Menyelenggarakan penelitian yang menghasilkan dan memanfaatkan teknologi untuk mengembangkan potensi lokal.\n3. Melakukan pengabdian kepada masyarakat dalam bidang teknik informatika."
            ],
            [
                'nama' => 'S1 SISTEM INFORMASI',
                'intro' => "Jurusan Sistem Informasi Institut Teknologi Del mulai melakukan penerimaan mahasiswa baru pada T.A 2014/2015. Jumlah mahasiswa yang diterima pada Tahun Ajaran tersebut adalah 56 mahasiswa. Dengan dukungan dosen yang ahli dalam sistem informasi, program studi ini dirancang untuk memenuhi kebutuhan terhadap tenaga-tenaga muda yang terampil dan profesional, terutama terkait dengan pengembangan, pemanfaatan, dan pengelolaan Sistem Informasi/Teknologi Informasi dalam suatu organisasi. Kurikulum Program Studi Sistem Informasi IT Del mengacu kepada beberapa kurikulum Sarjana Sistem Informasi di Indonesia maupun Internasional, seperti: Program Studi Sarjana Teknologi dan Sistem Informasi ITB, Program Studi Sarjana Sistem Informasi Universitas Indonesia serta mengacu kepada kurikulum ACM (Association for Computing Machinary) for Information System.",
                'visi' => "Pada tahun 2024 menjadi Program Studi yang unggul dalam bidang sistem informasi dan analisis data di Indonesia serta turut aktif dalam kegiatan penelitian bertaraf nasional.",
                'misi' => "1. Menyelenggarakan pendidikan bermutu dan berorientasi pada kebutuhan industri.\n2. Melakukan penelitian yang berkontribusi pada kemajuan IPTEK.\n3. Melakukan pengabdian kepada masyarakat dalam bentuk pendeseminasian dan penerapan IPTEK, pelatihan, dan sertifikasi.\n4. Menerapkan sistem pengelolaan program studi yang profesional, bermutu, efektif, efisien, dan akuntabel."
            ],
            [
                'nama' => 'S1 TEKNIK ELEKTRO',
                'intro' => "Program Studi Teknik Elektro berupaya untuk meningkatkan layanan yang baik kepada mahasiswa serta mampu menjawab keperluan industri melalui lulusan tenaga terdidik dan juga terampil di bidangnya. PSTE berdasarkan analisis SWOT dan diskusi dengan berbagai stakeholder menetapkan visi, misi, tujuan dan sasaran yang akan dilakukan dalam pelaksanaan kurikulum 2019. Visi, misi, tujuan, dan sasaran ini juga dirumuskan sejalan dengan visi, misi, tujuan, dan sasaran Fakultas Informatika dan Teknik Elektro.",
                'visi' => "Visi Program Studi Teknik Elektro adalah Mewujudkan program pendidikan Teknik Elektro yang unggul dan penyelenggaraan penelitian bidang Teknik Elektro yang bertaraf nasional pada tahun 2024.",
                'misi' => "1. Menyelenggarakan pendidikan teknik elektro yang bermutu dan profesional.\n2. Menyelenggarakan penelitian yang bermanfaat bagi kemajuan IPTEK.\n3. Melakukan pengabdian kepada masyarakat dalam bidang teknik elektro khususnya di daerah rural.\n4. Mengelola Program Studi Teknik Elektro secara efektif dan efisien."
            ],
            [
                'nama' => 'Sarjana Terapan (D4) Teknologi Rekayasa Perangkat Lunak',
                'intro' => "Sarjana Terapan (Diploma 4) Teknologi Rekayasa Perangkat Lunak (Sarjana Terapan TRPL) merupakan program studi pada pendidikan vokasi. Diploma 4 (D4) adalah nama lain dari Sarjana Terapan. Program studi Sarjana Terapan TRPL berdiri pada tahun 2012 sesuai dengan SK Menteri Pendidikan dan Kebudayaan Republik Indonesia No. 238/E/O/2012 pada tanggal 6 Juli 2012 dengan nama Sarjana Terapan (DIV) Teknik Informatika. Perubahan nama dari program studi DIV Teknik Informatika menjadi DIV Teknologi Rekayasa Perangkat Lunak adalah mengikuti nomenklatur Program Studi sesuai Keputusan Menteri Riset, Teknologi, dan Pendidikan Tinggi Republik Indonesia Nomor 57/M/KPT/2019.",
                'visi' => "Menjadi pusat pendidikan dan pengajaran berstandar nasional dan bersinergi dengan dunia industri yang menghasilkan Sarjana Sains Terapan di bidang rekayasa perangkat lunak yang berdaya saing dalam Masyarakat Ekonomi ASEAN.",
                'misi' => "1. Menyelenggarakan pendidikan dan pengajaran vokasional yang menerapkan prinsip student-centered learning dan berbasis pada kompetensi yang dibutuhkan dunia kerja.\n2. Mendorong pengembangan kelembagaan program studi yang berorientasi pada standar mutu nasional.\n3. Meningkatkan kemampuan untuk berwirausaha dalam rangka menambah jumlah lapangan pekerjaan di bidang teknologi informasi.\n4. Mendorong keterlibatan program studi dalam kegiatan di level nasional dan internasional.\n5. Menyelenggarakan program penelitian yang menghasilkan produk teknologi informasi yang memberikan solusi tepat guna dan inovatif.\n6. Menyelenggarakan proses pengabdian kepada masyarakat di lingkungan internal maupun lingkungan eksternal (industri, pemerintah dan masyarakat umum) melalui berbagai program diseminasi teknologi informasi."
            ],
        ];


        foreach ($programs as $program) {
            DB::table('programs')->insert($program);
        }
    }
}
