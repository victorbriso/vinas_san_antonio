<ul>
    <li>Inicio
        <ul>
            <li><?= $this->html->link('Slider', ['action'=>'slider']) ?></li>
        </ul>
    </li>
    <li>Quienes Somos
        <ul>
            <li><?= $this->html->link('Los Pioneros', ['action'=>'gestorContenidos', 1]) ?></li>
            <li><?= $this->html->link('AVVSA', ['action'=>'gestorContenidos', 2]) ?></li>
            <li><?= $this->html->link('Viñas', ['action'=>'vinas']) ?></li>
            <li><?= $this->html->link('Código de ética', ['action'=>'gestorContenidos', 3]) ?></li>
        </ul>
    </li>
    <li>Terroir
        <ul>
            <li><?= $this->html->link('Terroir', ['action'=>'gestorContenidos', 4]) ?></li>
            <li><?= $this->html->link('Cepas', ['action'=>'gestorContenidos', 5]) ?></li>
            <li><?= $this->html->link('Los enologos y viticultores', ['action'=>'gestorContenidos', 6]) ?></li>
            <li><?= $this->html->link('Mapa físico', ['action'=>'gestorContenidos', 7]) ?></li>
        </ul>
    </li>
    <li><?= $this->html->link('Noticias', ['action'=>'gestorNoticias']) ?></li>
    <li><?= $this->html->link('Sustentabilidad', ['action'=>'gestorContenidos', 8]) ?></li>
    <li>Turismo
        <ul>
            <li><?= $this->html->link('Contactos', ['action'=>'gestorContenidos', 9]) ?></li>
            <li><?= $this->html->link('Ruta del vino', ['action'=>'gestorContenidos', 10]) ?></li>
            <li>Mapa Turistico</li>
        </ul>
    </li>
    <li><?= $this->html->link('Galeria de Imagenes', ['action'=>'subeImagen']) ?></li>
</ul>