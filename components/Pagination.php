<?php

/*
 * Класс Pagination для генерации постраничной навигации
 */
class Pagination
{
    // кол-во ссылок навигации на страницу
    private $max = 10;
    // ключ для GET, в котором пишется номер страницы
    private $index = 'page';
    // текущая страница
    private $current_page;
    // общее кол-во записей         *обяз
    private $total;
    // кол-во записей на страницу   *обяз
    private $limit;

    public function __construct($total, $currentPage, $limit, $index)
    {
        // устанавл. общее кол-во записей
        $this->total = $total;

        // устанавл. кол-во записей на страницу
        $this->limit = $limit;

        // устанавл. ключ в url
        $this->index = $index;

        // устанавл. кол-во страниц 
        $this->amount = $this->amount();

        // устанавл. номер текущей страницы
        $this->setCurrentPage($currentPage);
    }

    // Вызов ссылок.  -- HTML-код со ссылками навигации
    public function get()
    {
        // для записи ссылок
        $links = null;

        // получение ограничения для цикла
        $limits = $this->limits();

        $html = '<ul class="pagination">';
        // генерируем ссылки
        for($page = $limits[0]; $page <= $limits[1]; $page++) {
            // если это текущая страница, ссыдки нет и добавляется класс active
            if ($page == $this->current_page) {
                $links .= '<li class="active"><a href="#">'.$page.'</a></li>';
            } else {
            // иначе генерируем ссылку
                $links .= $this->generateHtml($page);
            }
        }

        // Если ссылки создались
        if (!is_null ($links)) {
            // если текущая страница не первая
            if ($this->current_page > 1)
            // ... создает ссылку на первую
                $links = $this->generateHtml(1, '&lt;').$links;

            // если текущая страница не первая
            if ($this->current_page < $this->amount)
            // ... создаем ссылку на последнюю
                $links .= $this->generateHtml($this->amount, '&gt;');
        }

        $html .= $links .'</ul>';

        // возвращаем html
        return $html;
    }


    // Для генерации HTML-кода ссылки
    private function generateHtml($page, $text = null)
    {
        // если текст ссылки не указан
        if (!$text) 
        // указываем, что текст - цифра страницы
            $text = $page;

        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/').'/';
        $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
        // формируем HTML-код.
        return '<li><a href="'.$currentURI . $this->index . $page . '">' .$text. '</a></li>';
    }

///////////////////////////////////////////////////////////////////////////////// git+ 
     /**
     *  Для получения, откуда стартовать
     * 
     * @return массив с началом и концом отсчёта
     */
    private function limits()
    {
        # Вычисляем ссылки слева (чтобы активная ссылка была посередине)
        $left = $this->current_page - round($this->max / 2);
        
        # Вычисляем начало отсчёта
        $start = $left > 0 ? $left : 1;

        # Если впереди есть как минимум $this->max страниц
        if ($start + $this->max <= $this->amount) {
        # Назначаем конец цикла вперёд на $this->max страниц или просто на минимум
            $end = $start > 1 ? $start + $this->max : $this->max;
        } else {
            # Конец - общее количество страниц
            $end = $this->amount;

            # Начало - минус $this->max от конца
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }

        # Возвращаем
        return
                array($start, $end);
    }


    /**
     * Для установки текущей страницы
     * 
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        # Получаем номер страницы
        $this->current_page = $currentPage;

        # Если текущая страница больше нуля
        if ($this->current_page > 0) {
            # Если текущая страница меньше общего количества страниц
            if ($this->current_page > $this->amount)
            # Устанавливаем страницу на последнюю
                $this->current_page = $this->amount;
        } else
        # Устанавливаем страницу на первую
            $this->current_page = 1;
    }


    /**
     * Для получения общего числа страниц
     * 
     * @return число страниц
     */
    private function amount()
    {
        # Делим и возвращаем
        return ceil($this->total / $this->limit);
    }


}
