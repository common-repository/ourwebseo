<?php
/*
 *
* File Name: ourwebseo_sitemap.php
* Created on 11/1/2021
* (c)2021 Bill Banks
*/

class ourwebseo_sitemap
{
    /**
     * Constructs
     */
    function __construct() {
        //add_action('admin_init', [$this, 'buildSitemap']);
        //add_action('init', [$this, 'buildSitemap']);
        //register_activation_hook( __FILE__, [$this, 'buildSitemap']);
    }

    /**
     * Returns permalink of post id
     *
     * @return bool
     */
    protected function getPermalinkFromId($id) {
        $post_status = get_post_status($id);
        $post_type = get_post_type_object(get_post_type($id));

        // Don't link if item is private and user does't have capability to read it.
        if ($post_status === 'private' && $post_type !== null && !current_user_can($post_type->cap->read_private_posts)) {
            return '';
        }

        $url = get_permalink($id);
        if ($url === false) {
            return '';
        }

        return $url;
    }

    /**
     * Gets posts and builds a basic sitemap.
     *
     * @return array
     */
    public function buildSitemap() {
        global $wpdb;

        $xmlString = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

        $qs = "SELECT
			p.ID,
			p.post_author,
			p.post_status,
			p.post_name,
			p.post_parent,
			p.post_type,
			p.post_date,
			p.post_date_gmt,
			p.post_modified,
			p.post_modified_gmt,
			p.comment_count
		FROM
			{$wpdb->posts} AS p
		WHERE
			p.post_password = ''
			AND p.post_status = 'publish'
		ORDER BY
			p.post_date_gmt DESC";

        $posts = $wpdb->get_results($qs);

        /* home first */
        $home = get_home_url();
        $xmlString .= '<url>
		<loc>'.$home.'</loc>
		<lastmod>'.date('c').'</lastmod>
		<priority>1.00</priority>
		</url>';

        foreach($posts as $post) {

            $permalink = $this->getPermalinkFromId($post->ID);
            $xmlString .= '<url>
			<loc>'.htmlspecialchars($permalink).'</loc>
			<lastmod>'.date('c', strtotime($post->post_date_gmt)).'</lastmod>
			<priority>0.80</priority>
			</url>';
        }

        $xmlString .= '</urlset>';

        @unlink(ABSPATH.'sitemap.xml');
        $file = fopen(ABSPATH."sitemap.xml", "w");
        fwrite($file, $xmlString);
        fclose($file);
    }

}