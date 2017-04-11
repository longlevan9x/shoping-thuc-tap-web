<?php
/**
* 
*/

class Pagination
{
	private static function __findStart($currentPage, $limit)
	{
		$start = ($currentPage - 1) * $limit;
		return $start;
	}

	public static function createLink($uri, $filter = array())
	{
		$string = '';
		foreach ($filter as $k => $item) {
			$string .= (empty($string)) ? "?{$k}={$item}" : "&{$k}={$item}";
		}

		return $uri . $string;
	}

	public static function paging($link, $totalRecord, $currentPage, $limit, $keyword = '')
	{
		$totalPage = ceil($totalRecord / $limit);

		if ($currentPage > $totalRecord) {
			$currentPage = $totalPage;
		}
		elseif($currentPage < 1){
			$currentPage = 1;
		}

		$start = self::__findStart($currentPage, $limit);

		$html = self::__nextPrev($currentPage, $totalPage, $link);

		return array(
			'start'   => $start,
			'limit'   => $limit,
			'html'    => $html,
			'keyword' => $keyword,
		);
	}

	private static function __nextPrev($currentPage, $totalPage, $link)
	{
		$html = '<ul class="pagination">';
		if ($currentPage > 1 && $totalPage > 1) {
			$html .= "<li><a href='".str_replace("{page}", 1 , $link)."'>First</a></li>";
			$html .= "<li><a href='".str_replace("{page}", $currentPage - 1 , $link)."'>Prev</a></li>";
		}
		for ($i=1; $i <= $totalPage; $i++) {
			if ($i == $currentPage) {
				$html .= '<li class="active"><a href="'.str_replace("{page}", $i , $link).'">'.$i.'</a></li>';
			}
			else{
				$html .= "<li><a href='".str_replace("{page}", $i , $link)."'>".$i."</a></li>";
			}
		}
		if ($currentPage < $totalPage && $totalPage > 1) {
			$html .= "<li><a href='".str_replace("{page}", $currentPage + 1, $link)."'>Next</a></li>";
			$html .= "<li><a href='".str_replace("{page}", $totalPage, $link)."'>Last</a></li>";
		}
		$html .= "</ul>";
		return $html;
	}
}
?>