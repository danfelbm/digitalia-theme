<?php
/**
 * ACF Fields for Podcast Post Type
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_podcast_acf_fields')) {
    function digitalia_register_podcast_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_podcast_details',
                'title' => 'Podcast Details',
                'show_in_rest' => true,
                'show_in_rest' => true,
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_episode_excerpt',
                        'label' => 'Episode Excerpt',
                        'name' => 'episode_excerpt',
                        'type' => 'textarea',
                        'instructions' => 'A brief summary of the episode. If left empty, the post excerpt will be used.',
                        'required' => 0,
                        'rows' => 3,
                    ),
                    array(
                        'key' => 'field_episode_duration',
                        'label' => 'Episode Duration',
                        'name' => 'episode_duration',
                        'type' => 'text',
                        'instructions' => 'Duration of the episode (e.g., "45:30" or "1h 15min")',
                        'required' => 0,
                        'placeholder' => '45:30',
                    ),
                    array(
                        'key' => 'field_episode_audio',
                        'label' => 'Episode Audio',
                        'name' => 'episode_audio',
                        'type' => 'file',
                        'instructions' => 'Upload or select the podcast audio file (MP3 format recommended)',
                        'required' => 1,
                        'return_format' => 'url',
                        'library' => 'all',
                        'mime_types' => 'mp3,m4a,wav',
                    ),
                    array(
                        'key' => 'field_podcast_platforms',
                        'label' => 'Podcast Platforms',
                        'name' => 'podcast_platforms',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_spotify_url',
                                'label' => 'Spotify URL',
                                'name' => 'spotify_url',
                                'type' => 'url',
                                'instructions' => 'Link to the episode on Spotify',
                                'required' => 0,
                                'placeholder' => 'https://open.spotify.com/episode/...',
                            ),
                            array(
                                'key' => 'field_apple_podcasts_url',
                                'label' => 'Apple Podcasts URL',
                                'name' => 'apple_podcasts_url',
                                'type' => 'url',
                                'instructions' => 'Link to the episode on Apple Podcasts',
                                'required' => 0,
                                'placeholder' => 'https://podcasts.apple.com/podcast/...',
                            ),
                            array(
                                'key' => 'field_overcast_url',
                                'label' => 'Overcast URL',
                                'name' => 'overcast_url',
                                'type' => 'url',
                                'instructions' => 'Link to the episode on Overcast',
                                'required' => 0,
                                'placeholder' => 'https://overcast.fm/...',
                            ),
                            array(
                                'key' => 'field_rss_url',
                                'label' => 'RSS Feed URL',
                                'name' => 'rss_url',
                                'type' => 'url',
                                'instructions' => 'RSS feed URL for the podcast',
                                'required' => 0,
                                'placeholder' => 'https://example.com/feed/podcast',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_episode_number',
                        'label' => 'Episode Number',
                        'name' => 'episode_number',
                        'type' => 'number',
                        'instructions' => 'The episode number (optional)',
                        'required' => 0,
                        'min' => 1,
                        'step' => 1,
                    ),
                    array(
                        'key' => 'field_episode_season',
                        'label' => 'Season Number',
                        'name' => 'episode_season',
                        'type' => 'number',
                        'instructions' => 'The season number (optional)',
                        'required' => 0,
                        'min' => 1,
                        'step' => 1,
                    ),
                    array(
                        'key' => 'field_episode_transcript',
                        'label' => 'Episode Transcript',
                        'name' => 'episode_transcript',
                        'type' => 'wysiwyg',
                        'instructions' => 'Full transcript of the episode (optional)',
                        'required' => 0,
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'podcast',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => 'Fields for podcast episodes',
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_podcast_acf_fields');
