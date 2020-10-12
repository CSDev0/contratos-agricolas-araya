<?php

use Illuminate\Database\Seeder;
use App\Product_category;
use App\Product;

class ProductSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->insertProductCategories();

        $this->insertProducts();
    }

    public function insertProductCategories(): void {
        $categories = [
            [1, 'Vegetales'],
            [2, 'Frutales y frutas'],
            [3, 'Granos y semillas'],
            [4, 'Frutos secos'],
            [5, 'Alimentos procesados'],
            [6, 'Fruta órganica'],
            [7, 'Otros']
        ];
        $categories = array_map(function ($category) {
            return [
                'id' => $category[0],
                'name' => $category[1]
            ];
        }, $categories);

        Product_category::insert($categories);
    }

    public function insertProducts(): void {
        $products = [
            [1, 'Acelga', 1],
            [2, 'Achicoria', 1],
            [3, 'Ají', 1],
            [4, 'Ajo', 1],
            [5, 'Alcachofa', 1],
            [6, 'Apio', 1],
            [7, 'Arbejas', 1],
            [8, 'Berenjena', 1],
            [9, 'Betarraga', 1],
            [10, 'Bok Choy', 1],
            [11, 'Brocoli', 1],
            [12, 'Bruselas', 1],
            [13, 'Calabaza', 1],
            [14, 'Camote', 1],
            [15, 'Cebolla', 1],
            [16, 'Chalotes', 1],
            [17, 'Champiñones', 1],
            [18, 'Cilantro', 1],
            [19, 'Coliflor', 1],
            [20, 'Esparragos', 1],
            [21, 'Espinaca', 1],
            [22, 'Haba', 1],
            [23, 'Hojas de cebolla', 1],
            [24, 'Jengibre', 1],
            [25, 'Lechuga', 1],
            [26, 'Nabo', 1],
            [27, 'Otras coles', 1],
            [28, 'Otras hortalizas de hoja', 1],
            [29, 'Papa', 1],
            [30, 'Pepino', 1],
            [31, 'Perejil', 1],
            [32, 'Pimenton', 1],
            [33, 'Puerro', 1],
            [34, 'Rábano', 1],
            [35, 'Radicchio', 1],
            [36, 'Remolacha', 1],
            [37, 'Repollo', 1],
            [38, 'Ruibarbo', 1],
            [39, 'Tara', 1],
            [40, 'Tomate', 1],
            [41, 'Vainas', 1],
            [42, 'Zanahoria', 1],
            [43, 'Zapallo', 1],
            [44, 'Zapallo italiano', 1],
            [45, 'Aceituna', 2],
            [46, 'Achiote', 2],
            [47, 'Arándano', 2],
            [48, 'Caqui', 2],
            [49, 'Cereza', 2],
            [50, 'Chirimoya', 2],
            [51, 'Ciruela', 2],
            [52, 'Clementina', 2],
            [53, 'Coco', 2],
            [54, 'Damasco', 2],
            [55, 'Durazno', 2],
            [56, 'Frambuesa', 2],
            [57, 'Frutilla/Fresa', 2],
            [58, 'Granadas', 2],
            [59, 'Grosella', 2],
            [60, 'Guayaba', 2],
            [61, 'Guinda', 2],
            [62, 'Higo', 2],
            [63, 'Kiwi', 2],
            [64, 'Lichi', 2],
            [65, 'Lima', 2],
            [66, 'Limón', 2],
            [67, 'Lúcuma', 2],
            [68, 'Mandarina', 2],
            [69, 'Mango', 2],
            [70, 'Manzana', 2],
            [71, 'Maracuyá', 2],
            [72, 'Melones', 2],
            [73, 'Membrillo', 2],
            [74, 'Mora', 2],
            [75, 'Naranja', 2],
            [76, 'Nectarines', 2],
            [77, 'Níspero', 2],
            [78, 'Palta/Aguacate', 2],
            [79, 'Papaya', 2],
            [80, 'Pera', 2],
            [81, 'Piña', 2],
            [82, 'Pitaya', 2],
            [83, 'Plátanos', 2],
            [84, 'Plumcot', 2],
            [85, 'Pomelo', 2],
            [86, 'Rosa Mosqueta', 2],
            [87, 'Sandía', 2],
            [88, 'Tuna', 2],
            [89, 'Uva de Mesa', 2],
            [90, 'Uva para vino', 2],
            [91, 'Arroz', 3],
            [92, 'Arvejas', 3],
            [93, 'Avena', 3],
            [94, 'Cacao', 3],
            [95, 'Canola', 3],
            [96, 'Centeno', 3],
            [97, 'Choclo', 3],
            [98, 'Frijoles', 3],
            [99, 'Granos de café', 3],
            [100, 'Granos de maiz', 3],
            [101, 'Guisantes', 3],
            [102, 'Legumbres', 3],
            [103, 'Maravilla', 3],
            [104, 'Semillas', 3],
            [105, 'Trébol', 3],
            [106, 'Trigo', 3],
            [107, 'Almendra', 4],
            [108, 'Anacardo', 4],
            [109, 'Avellana', 4],
            [110, 'Castañas', 4],
            [111, 'Maní', 4],
            [112, 'Nueces', 4],
            [113, 'Nuez de Brasil', 4],
            [114, 'Nuez de Macadamia', 4],
            [115, 'Pecana', 4],
            [116, 'Pistacho', 4],
            [117, 'Aceites', 5],
            [118, 'Fruta deshidratada', 5],
            [119, 'Fruta liofilizada', 5],
            [120, 'Frutas Congeladas', 5],
            [121, 'Frutas Procesadas', 5],
            [122, 'Jaleas, mermeladas y zumos', 5],
            [123, 'Mix Berry', 5],
            [124, 'Pasas', 5],
            [125, 'Fruta orgánica', 6],
            [126, 'Frutos secos orgánicos', 6],
            [127, 'Granos orgánicos', 6],
            [128, 'Vegetales Orgánicos', 6],
            [129, 'Carnes', 7],
            [130, 'Huevos', 7],
            [131, 'Productos de origen animal', 7]
        ];
        $products = array_map(function ($product) {
            return [
                'id' => $product[0],
                'name' => $product[1],
                'category_id' => $product[2],
            ];
        }, $products);

        Product::insert($products);
    }

}
