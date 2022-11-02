<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'MacBook Pro',
                'user_id' => '1',
                'type' => '2',
                'price' => '178800',
                'detail' => 'M2チップ、登場。M1のスピードと電力効率を一段と引き上げる次世代のAppleシリコンです。よりパワフルな8コアCPUで、すばやく作業する。光のように速い10コアGPUで、美しいグラフィックスを生み出す。高性能メディアエンジンで、より多くの4Kまたは8KのProResビデオストリームを編集する。より高速な最大24GBのユニファイドメモリも積んでいるので、そのすべてを同時にこなせます。',
            ],
            [
                'name' => 'どうぶつの森',
                'user_id' => '1',
                'type' => '3',
                'price' => '6578',
                'detail' => '「あつまれ どうぶつの森」は、2001年4月14日にニンテンドウ 64用ソフトとして発売された『どうぶつの森』シリーズの最新作。村のどうぶつたちと交流したり、季節行事へ参加したり、気ままなスローライフが楽しめる。村や街が舞台となっていたこれまでの作品と異なり、本作では“たぬき開発”が企画した“無人島移住パッケージ”で新生活を始めることとなる。島では、自然と触れ合えるほか、新たにDIY（Do It Yourself）で家具を作ることも可能。',
            ],
            [
                'name' => '非常識な成功法則',
                'user_id' => '1',
                'type' => '1',
                'price' => '1430',
                'detail' => '赤裸々で粗削り、ビジネス書界の超重要人物が自らの成功の秘訣を明かした、25万部を超えるベスト&ロングセラー待望のリニューアル。',
            ],
            [
                'name' => 'ドラム式洗濯機',
                'user_id' => '1',
                'type' => '4',
                'price' => '149800',
                'detail' => '一般的な防水パン（内寸奥行540mm以上）に設置できる、奥行スリムなコンパクト設計。真下排水にも対応しています。使いやすいサイズなので、ドア開閉や衣類の取り出しもスムーズに行えます。',
            ],
            [
                'name' => 'ガラスのステージ',
                'user_id' => '1',
                'type' => '5',
                'price' => '58000',
                'detail' => 'お部屋のちょっとしたスペースでもお祀りいただける、コンパクトでモダンなデザイン。美しいライトブルーのガラスが織り成す、やわらかな光が溢れる神秘的な空間が広がります。ボックスはプレートと独立しているため、お位牌の数やサイズに応じて縦横自由に配置いただけるのが特徴です。',
            ],
            [
                'name' => '厚切り芯たん塩仕込み',
                'user_id' => '1',
                'type' => '6',
                'price' => '6318',
                'detail' => '素材を厳選し、芯たんの中でも 最もやわらかい中心部のみを贅沢に使用しました。やわらかくジューシーな極上の逸品です。',
            ],
            [
                'name' => 'ロキソニンSプレミアム',
                'user_id' => '1',
                'type' => '7',
                'price' => '1198',
                'detail' => 'つらい痛みに速効＋胃を守る成分。つらい痛みにすばやく効く鎮痛成分（ロキソプロフェンナトリウム水和物）に、アリルイソプロピルアセチル尿素を配合、鎮痛効果を高めます。さらに無水カフェインを配合、鎮痛効果を助けます。メタケイ酸アルミン酸マグネシウムを配合、胃粘膜保護作用により、胃を守ります。のみやすい小型錠の痛み止め・解熱剤です。コロナウイルスのワクチン接種後の発熱・痛みに。',
            ],
            [
                'name' => 'シックスパッド パワースーツ',
                'user_id' => '1',
                'type' => '8',
                'price' => '38800',
                'detail' => 'ボディラインや姿勢を保つために大切な腹筋や脇腹、背筋に同時にアプローチし、体幹を鍛える「Powersuit Core Belt」。2種類のモードを搭載し、有酸素運動や筋トレとの併用も可能。お腹周りに加え、後ろ姿も引き締まった理想的なボディを目指せます。',
            ],
            [
                'name' => 'マセラティ ギブリ',
                'user_id' => '1',
                'type' => '9',
                'price' => '19100000',
                'detail' => 'V6ターボやV8ターボエンジンはもちろん、ハイブリッドモデルを選んでもマセラティならではのパワフルな走りでドライバーを魅了します。美しいスタイルや刺激的なドライビングパフォーマンスで人生を彩るギブリ。そしてなにより、至極のエキゾーストサウンドは、マセラティだけに与えられた芸術です。',
            ],
            [
                'name' => 'ムートンスリッパ',
                'user_id' => '1',
                'type' => '10',
                'price' => '2990',
                'detail' => '本物の天然羊毛をふんだんに使用した、室内用ムートンスリッパです。足の甲部分が長く履き口部分にたっぷりと天然羊毛を使用しているため、通常のスリッパと比べとてもあたたかいです。また、足底部分にも天然羊毛を使用していますので、床暖房がなくても暖かい、エコで快適なムートンスリッパです。冷え性でお悩みの方にもオススメです。',
            ],
            [
                'name' => 'Surface Pro',
                'user_id' => '1',
                'type' => '1',
                'price' => '143570',
                'detail' => '強力な第11世代インテルCoreプロセッサが、膨大なワークロードにも対応。i5とi7のWi-Fiオプションと256GB以上のストレージをインテルEvoプラットフォームに搭載。',
            ],
            [
                'name' => 'スプラトゥーン3',
                'user_id' => '1',
                'type' => '2',
                'price' => '6500',
                'detail' => 'ヒトの姿に変身する不思議なイカたちによる、アクションシューティングがパワーアップして登場。4対4のチームに分かれて、地面を塗った面積で勝敗を決める基本的なルールはそのままに、新たなブキやスペシャルウェポン、バトルアクションが追加。',
            ],
            [
                'name' => 'Think CIVILITY',
                'user_id' => '1',
                'type' => '3',
                'price' => '1760',
                'detail' => '全米で話題「礼節の科学」、ついに日本初上陸!MBAで「職場の無礼さ」を研究する著者、20年間の集大成がこの1冊に凝縮!一流のエリートほど、なぜ不機嫌にならないのか。ビジネスでも、人間関係でも、最強の武器になる礼節の力を徹底解説!',
            ],
            [
                'name' => 'エオリア',
                'user_id' => '1',
                'type' => '4',
                'price' => '198000',
                'detail' => '冷暖房しながら、 外気をたっぷり取り込み「換気」。吸湿・放湿力に優れた「高分子収着材」が、すばやい「加湿」を可能にし、業界初の「ドライ給気制御」で寒くなりにくい「除湿」も実現します。',
            ],
            [
                'name' => 'フロートテレビボード',
                'user_id' => '1',
                'type' => '5',
                'price' => '226600',
                'detail' => 'W240cmのテレビボードです。中央部が同色仕上げガラスフラップ扉仕様で左右が引出仕様です。同色仕上げガラスフラップ扉は閉じたままでもリモコン操作ができます。引出はゆっくり閉まるソフトクローズ機能付き。ドイツの引出金具システムのトップメーカー、ヘティヒ社のレールを採用しています。',
            ],
            [
                'name' => '海老大餃子',
                'user_id' => '1',
                'type' => '6',
                'price' => '1620',
                'detail' => 'フライパン一つで、油・水なしで誰が調理しても食欲をそそるパリッパリの羽根ができる、プリプリの海老とシャキシャキな筍・クワイの食感、帆立出汁のきいた芳醇な味わいを楽しめる大ぶりの焼餃子です。 油・水なし調理が可能です。',
            ],
            [
                'name' => 'ウナクール',
                'user_id' => '1',
                'type' => '7',
                'price' => '450',
                'detail' => 'かゆみをダブル作用で止める、つめたいスポンジタイプのかゆみ止めです。',
            ],
            [
                'name' => 'ステルスグローレドライバー',
                'user_id' => '1',
                'type' => '8',
                'price' => '97900',
                'detail' => '先進の複合素材によるボディ構造と、軽量カーボンフェース+「ツイストフェース」がもたらす、驚異的なボール初速と高い安定性、そしてさらなる低重心設計。飛距離、安定性、打音、全てを高次元で叶え、バックウェイトが発揮する高い寛容性によりミスヒットに強い、やさしく飛ばせる軽量クラブ設計のステルス グローレ ドライバー。',
            ],
            [
                'name' => 'GT-R NISMO',
                'user_id' => '1',
                'type' => '9',
                'price' => '12329900',
                'detail' => 'レーシングテクノロジーが生み出す圧倒的な速さを、GT-Rのフォルムを保ったまま追求した特別な1台。それが、GT-R Track edition engineered by NISMOである。日産ワークスであるNISMOが、最先端のレーシングフィールドで鍛え上げたテクノロジーを惜しみなく投入。',
            ],
            [
                'name' => 'トゥルースリーパー',
                'user_id' => '1',
                'type' => '10',
                'price' => '54780',
                'detail' => 'トゥルースリーパー低反発オーバーレイマットレスの最上位モデル。硬さと形状の異なる素材を贅沢に重ねた3層構造。約10cmもの厚さのあるマットレスが睡眠時の腰や肩への負担を軽減します。',
            ],

        ]);
    }
}
