<?php
/**
 * easyLanding
 * 
 * Вывод всех дочерних документов друг за другом
 *
 * @category 	snippet
 * @version 	0.1
 * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal	@properties 
 * @internal	@modx_category add
 * @internal    @installset base, sample
 */
 /*
 *	Aviable params
 *	&orderBy - mysql ordering. Default menuindex ASC
 *  &parent	 - parent resource id. Default $modx->documentIdentifier
 *  &where - mysql where. Default  AND published=1
*/
 
include_once MODX_BASE_PATH.'assets/snippets/easyLanding/snippet.easyLanding.php';
