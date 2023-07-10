<?php

// Theme settings
if (class_exists('CSF')) {


	//============================//
	$prefix = 'PLSWB_MAKTABYAR_SETTINGS';

	CSF::createOptions($prefix, array(
		'framework_title'	=>	'تنظیمات قالب مکتب یار',
		'menu_title'		=>	'تنظیمات قالب مکتب یار',
		'menu_slug'			=>	'PLSWB_MAKTABYAR_SETTINGS',
		'footer_credit'		=>	'پنل تنظیمات توسط تیم توسعه پلاس وب طراحی شده است'
	));

	CSF::createSection($prefix, array(
		'id'			=>	'commemts',
		'title'			=>	'بخش نظرات',
	));

	CSF::createSection($prefix, array(
		'id'			=>	'poat-commemts',
		'parent'		=>	'commemts',
		'title'			=>	'نظرات نوشته ها',
		'fields'	=>	array(
			array(
				'id'     => 'opt-slider-fieldset',
				'type'   => 'fieldset',
				'title'  => 'Slider Settings',
				'fields' => array(
					array(
						'id'     => 'opt_slider_items',
						'type'   => 'repeater',
						'desc'  => 'Click the + button to add slider.',
						'fields' => array(
							array(
								'id'    	=>	'opt-slider-image',
								'type'  	=>	'media',
								'title'		=>	'Slider image',
								'subtitle'	=>	'Please select an image',
								'library'	=>	'image'
							),
							array(
								'id'    => 'opt-slider-title1',
								'type'  => 'text',
								'title' => 'Slider title 1',
							),
							array(
								'id'    => 'opt-slider-title2',
								'type'  => 'text',
								'title' => 'Slider title 2',
							),
							array(
								'id'    => 'opt-slider-title-link',
								'type'  => 'link',
								'title' => 'Slider link',
							),

						),
					),
				)
			),
			array(
				'id'     => 'opt-ads-fieldset',
				'type'   => 'fieldset',
				'title'  => 'Ads Settings',
				'fields' => array(
					array(
						'id'     => 'opt_ads_items',
						'type'   => 'repeater',
						'desc'  => 'Click the + button to add ads.',
						'fields' => array(
							array(
								'id'    	=>	'opt-ads-image',
								'type'  	=>	'media',
								'title'		=>	'Ads image',
								'subtitle'	=>	'Please select an image',
								'library'	=>	'image'
							),
							array(
								'id'    => 'opt-ads-link',
								'type'  => 'link',
								'title' => 'Ads link',
								'subtitle'	=>	'Enter a link for the image',
							),

						),
					),
				)
			),
			array(
				'id'     => 'opt_ads_items',
				'type'   => 'repeater',
				'desc'  => 'Click the + button to add ads.',
				'fields' => array(
					array(
						'id'    	=>	'opt-ads-image',
						'type'  	=>	'media',
						'title'		=>	'Ads image',
						'subtitle'	=>	'Please select an image',
						'library'	=>	'image'
					),
					array(
						'id'    => 'opt-ads-link',
						'type'  => 'link',
						'title' => 'Ads link',
						'subtitle'	=>	'Enter a link for the image',
					),

				),
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'product-commemts',
		'parent'		=>	'commemts',
		'title'			=>	'پرسش و پاسخ محصول',
		'fields'	=>	array(
			array(
				'id'         => 'opt-product-display-form-comments',
				'type'       => 'button_set',
				'title'      => 'فرم پرسش و پاسخ',
				'options'    => array(
					false => 'غیرفعال',
					true  => 'فعال',
				),
				'default'    => true
			),
			array(
				'id'         => 'opt-product-display-rating-comments',
				'type'       => 'button_set',
				'title'      => 'امتیازدهی به دوره',
				'options'    => array(
					false => 'غیرفعال',
					true  => 'فعال',
				),
				'default'    => true
			),
			array(
				'id'         => 'opt-product-allow-reply-comments',
				'type'       => 'button_set',
				'title'      => 'اجازه پاسخ دهی به دیگران',
				'options'    => array(
					false => 'غیرفعال',
					true  => 'فعال',
				),
				'default'    => true
			),
			array(
				'id'         => 'opt-product-allow-add-comments',
				'type'       => 'button_set',
				'title'      => 'چه کسانی می توانند پرسش ثبت کنند؟',
				'options'    => array(
					false => 'فقط خریداران',
					true  => 'همه',
				),
				'default'    => true
			),
			array(
				'id'         => 'opt-product-rules-display-comments',
				'type'       => 'button_set',
				'title'      => 'نمایش قوانین',
				'options'    => array(
					false => 'خیر',
					true  => 'بله',
				),
				'default'    => true
			),
			array(
				'id'    	=>	'opt-product-rules-comments',
				'type'  	=>	'wp_editor',
				'title'		=>	'قوانین مربوط به پرسش و پاسخ دوره',
			),

		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'home',
		'title'			=>	'Home Settings',
	));

	CSF::createSection($prefix, array(
		'id'			=>	'topsection',
		'parent'		=>	'home',
		'title'			=>	'Top Section Settings',
		'fields'	=>	array(
			array(
				'id'     => 'opt_topsection_items',
				'type'   => 'repeater',
				'desc'  => 'Click the + button to add item.',
				'fields' => array(
					array(
						'id'    	=>	'opt-topsection-icon',
						'type'  	=>	'icon',
						'title'		=>	'Top Section icon',
					),
					array(
						'id'    	=>	'opt-topsection-title',
						'type'  	=>	'text',
						'title'		=>	'Top Section title',
						'subtitle'	=>	'Enter the title',
					),
					array(
						'id'    	=>	'opt-topsection-content',
						'type'  	=>	'textarea',
						'title'		=>	'Top Section content',
						'subtitle'	=>	'Enter the content',
					),
					array(
						'id'    	=>	'opt-topsection-link',
						'type'  	=>	'link',
						'title'		=>	'Top Section link',
					),
					array(
						'id'    	=>	'opt-topsection-title-button',
						'type'  	=>	'text',
						'title'		=>	'Top Section title button',
						'subtitle'	=>	'Enter the title button',
					),
				),
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'Testimonials',
		'parent'		=>	'home',
		'title'			=>	'Testimonials Settings',
		'fields'	=>	array(
			array(
				'type'    => 'heading',
				'content' => 'Shortcode : [testimonials count="1" display="1"]',
			),
			array(
				'id'    	=>	'opt-testimonial-view-link',
				'type'  	=>	'link',
				'title'		=>	'View more link',
			),
			array(
				'id'     => 'opt_testimonial_items',
				'type'   => 'repeater',
				'desc'  => 'Click the + button to add testimonial.',
				'fields' => array(
					array(
						'id'    	=>	'opt-testimonial-image',
						'type'  	=>	'media',
						'title'		=>	'Testimonial image',
						'subtitle'	=>	'Please select an image',
						'library'	=>	'image'
					),
					array(
						'id'    	=>	'opt-testimonial-title',
						'type'  	=>	'text',
						'title'		=>	'Testimonial title',
						'subtitle'	=>	'Enter the title',
					),
					array(
						'id'    	=>	'opt-testimonial-content',
						'type'  	=>	'textarea',
						'title'		=>	'Testimonial content',
						'subtitle'	=>	'Enter the content',
					),
				),
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'homeleaderrealtycounter',
		'parent'		=>	'home',
		'title'			=>	'Counter Settings',
		'fields'	=>	array(
			array(
				'id'     => 'opt_homeleaderrealtycounter_items',
				'type'   => 'repeater',
				'desc'  => 'Click the + button to add item.',
				'fields' => array(
					array(
						'id'    	=>	'opt-homeleaderrealtycounter-id',
						'type'  	=>	'text',
						'title'		=>	'Counter ID',
						'subtitle'	=>	'Enter the ID',
					),
					array(
						'id'    	=>	'opt-homeleaderrealtycounter-title',
						'type'  	=>	'text',
						'title'		=>	'Counter title',
						'subtitle'	=>	'Enter the title',
					),
					array(
						'id'    	=>	'opt-homeleaderrealtycounter-number',
						'type'  	=>	'number',
						'title'		=>	'Counter number',
						'subtitle'	=>	'Enter the number',
					),
				),
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'homeleaderrealtylinkviews',
		'parent'		=>	'home',
		'title'			=>	'View Link',
		'fields'	=>	array(
			array(
				'id'    	=>	'opt-homeleaderrealtylinkviews-blog-link',
				'type'  	=>	'link',
				'title'		=>	'Blog view link',
			),
			array(
				'id'    	=>	'opt-homeleaderrealtylinkviews-properties-link',
				'type'  	=>	'link',
				'title'		=>	'Properties view link',
			),
			array(
				'id'    	=>	'opt-homeleaderrealtylinkviews-agents-link',
				'type'  	=>	'link',
				'title'		=>	'Agents view link',
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'popup',
		'title'			=>	'Pop Up',
		'fields'	=>	array(
			array(
				'id'      => 'opt-popup-status',
				'type'    => 'switcher',
				'title'   => 'Pop Up Status',
				'default' => false
			),
			array(
				'id'      => 'opt-popup-content',
				'type'  => 'wp_editor',
				'title'   => 'Content',
				'dependency' => array('opt-popup-status', '==', 'true')
			),
			array(
				'id'      => 'opt-popup-shortcode',
				'type'  => 'text',
				'title'   => 'Shortcode',
				'dependency' => array('opt-popup-status', '==', 'true')
			),
			array(
				'id'      => 'opt-popup-style',
				'type'  => 'code_editor',
				'title' => 'Popup Style',
				'dependency' => array('opt-popup-status', '==', 'true')
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'properties_shortcode',
		'title'			=>	'Properties Shortcode',
		'fields'	=>	array(
			array(
				'id'      => 'opt-properties-status',
				'type'    => 'switcher',
				'title'   => 'Properties Status',
				'default' => false
			),
			array(
				'id'      => 'opt-properties-banner',
				'type'    => 'media',
				'title'   => 'Banner',
				'library' => 'image',
			),
			array(
				'id'      => 'opt-properties-shortcode',
				'type'  => 'text',
				'title'   => 'Shortcode',
			),
			array(
				'id'      => 'opt-properties-style',
				'type'  => 'code_editor',
				'title' => 'Style Editor',
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'footer',
		'title'			=>	'Footer',
		'fields'	=>	array(
			array(
				'id'     => 'opt-footer-social',
				'type'   => 'repeater',
				'title'  => 'Social Link',
				'fields' => array(
					array(
						'id'    => 'opt-footer-social-icon',
						'type'  => 'icon',
						'title' => 'Icon'
					),
					array(
						'id'    => 'opt-footer-social-link',
						'type'  => 'link',
						'title' => 'Link'
					),
				),
			),
			array(
				'id'     => 'opt-footer-contact',
				'type'   => 'repeater',
				'title'  => 'Contact',
				'fields' => array(
					array(
						'id'    => 'opt-footer-contact-icon',
						'type'  => 'icon',
						'title' => 'Icon'
					),
					array(
						'id'    => 'opt-footer-contact-link',
						'type'  => 'link',
						'title' => 'Link'
					),
					array(
						'id'    => 'opt-footer-contact-title',
						'type'  => 'text',
						'title' => 'Title'
					),
				),
			),
			array(
				'id'    => 'opt-footer-about-us',
				'type'  => 'wp_editor',
				'title' => 'About Us'
			),
		)
	));

	CSF::createSection($prefix, array(
		'id'			=>	'schema',
		'title'			=>	'Schema Data',
		'fields'	=>	array(
			array(
				'id'    => 'opt-schema-phone',
				'type'  => 'text',
				'title' => 'Schema Phone'
			),
		)
	));


	//============================//
	$prefix = '_prefix_menu_options';

	CSF::createNavMenuOptions($prefix, array(
		'data_type' => 'serialize',
	));

	CSF::createSection($prefix, array(
		'fields' => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => 'Icon',
			),

		)
	));

	//============================//
	$prefix = 'PLSWB_COURSE_OPTION';
	CSF::createMetabox($prefix, array(
		'title'     =>	'تنظیمات صفحه',
		'post_type' =>	'product'
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'          => 'opt-description-card',
					'type'        => 'radio',
					'title'       => 'انتخاب کارت توضیحات',
					'options' => apply_filters('card_option', ['option1' => 'value1'], 20),
					'default'     => ''
				),
			)
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'          => 'opt-show-youtube-video',
					'type'        => 'switcher',
					'title'       => 'نمایش ویدیو',
					true  => 'فعال',
					false => 'غیر فعال',
					'default'    => false
				),
				array(
					'id'          => 'opt-youtube-video-code',
					'type'        => 'text',
					'title'       => 'کد ویدیو در یوتیوب',
					'dependency' => array('opt-show-youtube-video', '==', 'true') // check for true/false by field id
				),
			)
		)
	);

	//============================//
	$prefix = 'PLSWB_POST_OPTION';
	CSF::createMetabox($prefix, array(
		'title'     =>	'تنظیمات نوشته',
		'post_type' =>	'post'
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'          => 'opt-show-youtube-video',
					'type'        => 'switcher',
					'title'       => 'نمایش ویدیو',
					true  => 'فعال',
					false => 'غیر فعال',
					'default'    => false
				),
				array(
					'id'          => 'opt-youtube-video-code',
					'type'        => 'text',
					'title'       => 'کد ویدیو در یوتیوب',
					'dependency' => array('opt-show-youtube-video', '==', 'true') // check for true/false by field id
				),
			)
		)
	);

	//============================//
	$prefix = 'hlr_framework_properties';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Gallery',
		'post_type' =>	'properties',
		'context'   => 'side'
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'    => 'opt-gallery-properties',
					'type'  => 'gallery',
				),
			)
		)
	);

	$prefix = 'hlr_framework_properties-floorplan';
	CSF::createMetabox($prefix, array(
		'title'     =>	'FloorPlan',
		'post_type' =>	'properties',
		'context'   => 'side'
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'    => 'opt-gallery-properties-floorplan',
					'type'  => 'gallery',
				),
			)
		)
	);

	$prefix = 'hlr_framework_properties-location';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Location',
		'post_type' =>	'properties',
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'    => 'opt-map-properties',
					'type'  => 'map',
					'settings' => array(
						'scrollWheelZoom' => true,
					)
				),
			)
		)
	);

	$prefix = 'hlr_framework_properties-incentives';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Attributes',
		'post_type' =>	'properties',
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'     => 'opt_properties_incentives_items',
					'type'   => 'repeater',
					'desc'  => 'Click the + button to add item.',
					'fields' => array(
						array(
							'id'    => 'opt-icon-incentives',
							'type'  => 'icon',
							'title' => 'Icon',
						),
						array(
							'id'    	=>	'opt-link-incentives',
							'type'  	=>	'text',
							'title'		=>	'Title',
						),
					),
				),
			)
		)
	);

	$prefix = 'hlr_framework_properties-video';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Youtube Videos',
		'post_type' =>	'properties',
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'     => 'opt_properties_video_items',
					'type'   => 'repeater',
					'desc'  => 'Click the + button to add item.',
					'fields' => array(
						array(
							'id'      => 'opt-video-thumbnail',
							'type'    => 'media',
							'title'   => 'Thumbnail',
							'library' => 'image',
						),
						array(
							'id'      => 'opt-video-title',
							'type'    => 'text',
							'title'   => 'Title',
						),
						array(
							'id'      => 'opt-video-url',
							'type'    => 'text',
							'title'   => 'Url',
						),
					),
				),
			)
		)
	);

	$prefix = 'hlr_framework_properties_development_details';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Development Details',
		'post_type' =>	'properties',
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'     => 'opt_properties_development_details_items',
					'type'   => 'repeater',
					'desc'  => 'Click the + button to add item.',
					'fields' => array(
						array(
							'id'      => 'opt-development-details-title',
							'type'    => 'text',
							'title'   => 'Title',
						),
						array(
							'id'      => 'opt-development-details-content',
							'type'    => 'text',
							'title'   => 'Content',
						),
					),
				),
			)
		)
	);

	$prefix = 'hlr_framework_properties_price_list';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Price List',
		'post_type' =>	'properties',
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'     => 'opt_properties_price_list_items',
					'type'   => 'repeater',
					'desc'  => 'Click the + button to add item.',
					'fields' => array(
						array(
							'id'      => 'opt-price-list-image',
							'type'    => 'media',
							'title'   => 'Media',
							'library' => 'image',
						),
					),
				),
			)
		)
	);


	//============================//
	$prefix = 'hlr_framework_mapdata';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Map info',
		'post_type' =>	'properties'
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'    => 'opt-available-floorplans',
					'type'  => 'text',
					'title' => 'Available Floorplans'
				),
				// array(
				// 	'id'    => 'opt-permalink',
				// 	'type'  => 'text',
				// 	'title' => 'Permalink'
				// ),
				array(
					'id'    => 'opt-address',
					'type'  => 'text',
					'title' => 'Address'
				),
				array(
					'id'    => 'opt-street-address',
					'type'  => 'text',
					'title' => 'Street Address'
				),
				array(
					'id'    => 'opt-pricepersqft',
					'type'  => 'text',
					'title' => 'Pricepersqft'
				),
				array(
					'id'    => 'opt-price',
					'type'  => 'number',
					'title' => 'Price'
				),
				array(
					'id'    => 'opt-price-min',
					'type'  => 'number',
					'title' => 'Price Min'
				),
				array(
					'id'    => 'opt-price-max',
					'type'  => 'number',
					'title' => 'Price Max'
				),
				array(
					'id'    => 'opt-size-min',
					'type'  => 'number',
					'title' => 'Size Min'
				),
				array(
					'id'    => 'opt-size-max',
					'type'  => 'number',
					'title' => 'Size Max'
				),
				array(
					'id'          => 'opt-sales-type',
					'type'        => 'select',
					'title'       => 'Sales Type',
					'placeholder' => 'Select an option',
					'options'     => array(
						'Comming soon'  => 'Coming soon',
						'Preconstruction'  => 'Preconstruction',
						'Assignment'  => 'Assignment',
						'Resale'  => 'Resale',
						'SoldOut'  => 'Sold Out',
					),
					'default'     => 'Comming soon'
				),
				array(
					'id'    => 'opt-min-bed',
					'type'  => 'number',
					'title' => 'Min Bed'
				),
				array(
					'id'    => 'opt-max-bed',
					'type'  => 'number',
					'title' => 'Max Bed'
				),
				array(
					'id'    => 'opt-min-bath',
					'type'  => 'number',
					'title' => 'Min Bath'
				),
				array(
					'id'    => 'opt-max-bath',
					'type'  => 'number',
					'title' => 'Max Bath'
				),
				array(
					'id'          => 'opt-type',
					'type'        => 'select',
					'title'       => 'Type',
					'placeholder' => 'Select an option',
					'chosen'      => true,
					'multiple'    => true,
					'options'     => array(
						'Detached'  => 'Detached',
						'Freehold'  => 'Freehold',
						'TownHouse'  => 'TownHouse',
						'Condo'  => 'Condo',
						'Commercial'  => 'Commercial',
					),
					'default'     => ''
				),
				array(
					'id'    => 'opt-min-price-sqft',
					'type'  => 'number',
					'title' => 'Min Price Sqft'
				),
				array(
					'id'    => 'opt-max-price-sqft',
					'type'  => 'number',
					'title' => 'Max Price Sqft'
				),
				array(
					'id'    => 'opt-sqft-avg',
					'type'  => 'number',
					'title' => 'Sqft Avg'
				),
				array(
					'id'    => 'opt-occupancy',
					'type'  => 'number',
					'title' => 'Occupancy'
				),
				array(
					'id'    => 'opt-coming-soon',
					'type'  => 'switcher',
					'title' => 'Coming Soon',
					'default' => 0,
				),
				array(
					'id'          => 'opt-incentives',
					'type'        => 'select',
					'title'       => 'Incentives',
					'placeholder' => 'Select an option',
					'chosen'      => true,
					'multiple'    => true,
					'options'     => array(
						'Rental_Program' => 'Rental Program',
						'Five_Percent_Deposit' => '5% Ddeposit',
						'Ten_Percent_Deposit' => '10% Deposit',
						'Monthly_Payment_Deposit' => 'Monthly Payment Deposit',
						'Free_Maintenance' => 'Free Maintenance',
						'Free_Parking_and_Locker' => 'Free Parking and Locker',
						'Off_Purchase_Price' => '$Off Purchase Price',
						'Upgrade_Credit' => 'Upgrade Credit',
						'Cash_Back' => 'Cash Back'
					),
					'default'     => ''
				),
				array(
					'id'    => 'opt-comission-by-percent',
					'type'  => 'text',
					'title' => 'Comission By Percent',
				),
				array(
					'id'    => 'opt-comission-by-flatfee',
					'type'  => 'text',
					'title' => 'Comission By Flatfee',
				),
				array(
					'id'    => 'opt-city',
					'type'  => 'text',
					'title' => 'City',
				),
				array(
					'id'    => 'opt-studio',
					'type'  => 'text',
					'title' => 'Studio',
				),
				array(
					'id'          => 'opt-status',
					'type'        => 'select',
					'title'       => 'Sales Status',
					'placeholder' => 'Select an option',
					'chosen'      => true,
					'multiple'    => false,
					'options'     => array(
						'coming soon'  => 'coming soon',
						'available'  => 'available',
						'sold out'  => 'sold out',
					),
				),
				array(
					'id'    => 'opt-coords',
					'type'  => 'map',
					'title' => 'Coords',
					'default'     => array(
						'address'   => '300 Richmond St W #300, Toronto',
						'latitude'  => '43.6490596',
						'longitude' => '-79.391674',
						'zoom'      => '15',
					),
					'settings' => array(
						'scrollWheelZoom' => true,
					)
				),
				array(
					'id'    => 'opt-map-link',
					'type'  => 'link',
					'title' => 'Link to Map',
				),
				array(
					'id'    => 'opt-developer',
					'type'  => 'text',
					'title' => 'Developer',
				),
				array(
					'id'    => 'opt-architect',
					'type'  => 'text',
					'title' => 'Architect',
				),
				array(
					'id'    => 'opt-interior-designer',
					'type'  => 'text',
					'title' => 'Interior Designer',
				),
				array(
					'id'    => 'opt-floors',
					'type'  => 'number',
					'title' => 'Floors',
				),
				array(
					'id'    => 'opt-suites',
					'type'  => 'number',
					'title' => 'Suites',
				),

				array(
					'id'         => 'opt-parking',
					'type'       => 'button_set',
					'title'      => 'Parking',
					'options'    => array(
						true  => 'Yes',
						false => 'No',
					),
					'default'    => false
				),
				array(
					'id'         => 'opt-locker',
					'type'       => 'button_set',
					'title'      => 'Locker',
					'options'    => array(
						true  => 'Yes',
						false => 'No',
					),
					'default'    => false
				),
				array(
					'id'    => 'opt-parking-price',
					'type'  => 'number',
					'title' => 'Parking Price',
				),
				array(
					'id'    => 'opt-locker-price',
					'type'  => 'number',
					'title' => 'Locker Price',
				),
				array(
					'id'    => 'opt-mt-fees',
					'type'  => 'number',
					'title' => 'Monthly Fees',
				),

				array(
					'id'    => 'opt-deposit-structue',
					'type'     => 'wp_editor',
					'title' => 'Deposit Structure',
					'settings' => array(
						'theme'  => 'mdn-like',
						'mode'   => 'htmlmixed',
					),
					'default'  => '',
				),
				array(
					'id'          => 'opt-substage',
					'type'        => 'select',
					'title'       => 'Sub Stage',
					'placeholder' => 'Select an option',
					'chosen'      => true,
					'multiple'    => true,
					'options'     => array(
						'Registering_for_Platinum_Access' => 'Registering for Platinum Access',
						'Launched_Exclusive_units_in_hand' => 'Launched Exclusive units in hand'
					),
					'default'     => ''
				),
				array(
					'id'    => 'opt-apps',
					'type'  => 'number',
					'title' => 'Average Price per SQFT',
				),
				array(
					'id'     => 'opt_pdf_items',
					'type'   => 'repeater',
					'desc'  => 'Click the + button to upload PDF.',
					'fields' => array(
						array(
							'id'    => 'opt-pdf-files',
							'type'  => 'upload',
							'library'      => 'pdf',
							'title' => 'PDF File',
						),

					),
				),
			)
		)
	);

	//============================//
	$prefix = 'neighborhood_options';
	CSF::createTaxonomyOptions($prefix, array(
		'taxonomy'  => 'neighborhood',
		'data_type' => 'serialize'
	));

	CSF::createSection($prefix, array(
		'fields' => array(
			array(
				'id'    => 'opt-neighborhood-link',
				'type'  => 'link',
				'title' => 'Link',
			),
			array(
				'id'    => 'opt-neighborhood-image',
				'type'  	=>	'media',
				'library'	=>	'image',
				'title' => 'Thumbnail',
			),
			array(
				'id'    => 'opt-neighborhood-appson',
				'type'  => 'number',
				'title' => 'Average Price per SQFT',
			),
		)
	));

	//============================//
	$prefix = 'city_options';
	CSF::createTaxonomyOptions($prefix, array(
		'taxonomy'  => 'city',
		'data_type' => 'serialize'
	));

	CSF::createSection($prefix, array(
		'fields' => array(
			array(
				'id'    => 'opt-city-appsoc',
				'type'  => 'number',
				'title' => 'Average Price per SQFT',
			),
		)
	));


	//============================//
	$prefix = 'hlr_framework_floorplans';
	CSF::createMetabox($prefix, array(
		'title'     =>	'Floorplan Information',
		'post_type' =>	'floorplans'
	));

	CSF::createSection(
		$prefix,
		array(
			'fields'	=>	array(
				array(
					'id'          => 'opt-floorplans-status',
					'type'        => 'select',
					'title'       => 'Status',
					'validate' => 'csf_validate_require',
					'placeholder' => 'Select an option',
					'options'     => array(
						'sold_out'  => 'Sold Out',
						'available'  => 'Available',
					),
					'default'     => 'available',
				),
				array(
					'id'    => 'opt-floorplans-suite-name',
					'type'  => 'text',
					'title' => 'Suite Name'
				),
				array(
					'id'      => 'opt-floorplans-beds',
					'type'    => 'slider',
					'title'   => 'Beds',
					'min'     => 0,
					'max'     => 100,
					'step'    => 0.5,
					'default' => 0,
				),
				array(
					'id'      => 'opt-floorplans-baths',
					'type'  => 'slider',
					'title' => 'Baths',
					'min'     => 0,
					'max'     => 100,
					'step'    => 0.5,
					'default' => 0,
				),
				array(
					'id'      => 'opt-floorplans-size',
					'type'  => 'slider',
					'title' => 'Size',
					'min'     => 0,
					'max'     => 20000,
					'step'    => 1,
					'default' => 0,
				),
				array(
					'id'          => 'opt-floorplans-view',
					'type'        => 'select',
					'title'       => 'Type',
					'placeholder' => 'Select an option',
					'chosen'      => true,
					'multiple'    => true,
					'options'     => array(
						'East'  => 'East',
						'West'  => 'West',
						'North'  => 'North',
						'South'  => 'South',
						'North East'  => 'North East',
						'North West'  => 'North West',
						'South East'  => 'South East',
						'South West'  => 'South West',
					),
					'default'     => ''
				),
				array(
					'id'    => 'opt-floorplans-interior-size',
					'type'  => 'slider',
					'title' => 'Interior Size',
					'min'   => 0,
					'max'   => 20000,
					'step'  => 1,
					'default' => 0,
				),
				array(
					'id'    => 'opt-floorplans-floor-range',
					'type'  => 'text',
					'title' => 'Floor Range'
				),
				array(
					'id'    => 'opt-floorplans-price-from',
					'type'  => 'number',
					'title' => 'Price (From)'
				),
				array(
					'id'    => 'opt-floorplans-price-per',
					'type'  => 'number',
					'title' => 'Price Per Sq.Ft.'
				),
				array(
					'id'    => 'opt-floorplans-mt-fees-per-month',
					'type'  => 'text',
					'title' => 'Mt. Fees per Month'
				),
				array(
					'id'    => 'opt-floorplans-parking',
					'type'  => 'text',
					'title' => 'Parking'
				),
				array(
					'id'    => 'opt-floorplans-locker',
					'type'  => 'text',
					'title' => 'Locker'
				),
				array(
					'id'    => 'opt-floorplans-deposit-structure',
					'type'  => 'wp_editor',
					'title' => 'Deposit Structure'
				),
			)
		)
	);
}
