/********************
Amazon
********************/
(function() {
	tinymce.create('tinymce.plugins.amazon_shortcode_button', {
		init: function( editor, url ) {
			editor.addButton( 'amazon', {
			title: 'Amazonアソシエイトを挿入',
			image: url + '/images/amazon.png',
			onclick: function() {
				editor.windowManager.open({
				title: 'Amazonアソシエイトを挿入',
				body: [{
				type: 'textbox',
				name: 'id',
				tooltip: '商品情報に記載のISBN-10もしくはASINを入力',
				label: 'ISBN-10 もしくは ASIN'
				}],
				onsubmit: function( e ) {
				editor.insertContent( '[amazon asin="' + e.data.id + '"]' );
				}
				});
				}
				});
			},
			createControl: function( n, cm ) {
			return null;
			}
		});
	tinymce.PluginManager.add( 'amazon_shortcode_button_plugin', tinymce.plugins.amazon_shortcode_button );
})();

/********************
ボタン
********************/
(function() {
	tinymce.create('tinymce.plugins.button_button', {
		init: function( editor, url ) {
			editor.addButton( 'button', {
				title : 'ボタン',
				image: url + '/images/button.png',
				onclick: function() {
					editor.windowManager.open({
					title: 'ボタン',
					body: [{
						type: 'textbox',
						name: 'txt',
						label: 'ボタン文字',
						tooltip: '',
						},{
						type: 'textbox',
						name: 'url',
						label: 'リンク先URL',
						tooltip: '',
						},{
						type: 'checkbox',
						name: 'target',
						label: '新しいウィンドウでひらく',
						tooltip: '',
						}],
					onsubmit: function( e ) {
						if(e.data.target == false) {
						var selected_text = editor.selection.getContent();
						editor.insertContent( '<a href="' + e.data.url + '" class="btn">' + e.data.txt + '</a><p></p>' );
						} else if(e.data.target == true) {
						var selected_text = editor.selection.getContent();
						editor.insertContent( '<a href="' + e.data.url + '" class="btn" target="_blank">' + e.data.txt + '</a><p></p>' );
						}
					}
				});
				}
			});
		},
		createControl: function( n, cm ) {
		return null;
		}
	});
	tinymce.PluginManager.add( 'button_button_plugin', tinymce.plugins.button_button );
})();

/********************
ボックス
********************/
(function() {
	tinymce.create('tinymce.plugins.box_button', {
		init: function( editor, url ) {
			editor.addButton( 'box', {
				title : 'ボックス',
				image: url + '/images/box.png',
				onclick: function() {
					editor.windowManager.open({
					title: 'ボックス',
					body: [{
						type   : 'listbox',
						name   : 'type',
						label  : '種類',
						tooltip: 'ボックスの種類を選択',
						values : [
						{ text: '実線で囲い', value: 'box1' },
						{ text: '点線で囲い', value: 'box2' },
						{ text: '二重線で囲い', value: 'box3' },
						{ text: '上下に線', value: 'box4' },
						{ text: '左右に線', value: 'box5' },
						{ text: '上に線', value: 'box6' },
						{ text: '左に線', value: 'box7' },
						{ text: '背景色のみ', value: 'box8' },
						{ text: 'ストライプ', value: 'box9' },
						{ text: '折り返し', value: 'box10' },
						{ text: 'ステッチ', value: 'box11' },
						{ text: '交差線', value: 'box12' },
						{ text: 'カギカッコ', value: 'box13' },
						{ text: '枠線上にタイトル', value: 'box14' },
						],
						value : 'box1'
						}],
					onsubmit: function( e ) {
						if(e.data.type == 'box1') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box1"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box1"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box2') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box2"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box2"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box3') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box3"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box3"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box4') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box4"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box4"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box5') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box5"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box5"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box6') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box6"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box6"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box7') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box7"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box7"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box8') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box8"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box8"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box9') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box9"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box9"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box10') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box10"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box10"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box11') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box11"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box11"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box12') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box12"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box12"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box13') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box13"><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box13"><p>' + selected_text + '</p></div><p></p>' );
							}
						}
						else if(e.data.type == 'box14') {
							var selected_text = editor.selection.getContent();
							if(selected_text == '') {
								editor.insertContent( '<div class="box box14"><div class="ttl">タイトル</div><p>ここにテキストを入力</p></div><p></p>' );
							}
							else {
								editor.insertContent( '<div class="box box14"><div class="ttl">タイトル</div><p>' + selected_text + '</p></div><p></p>' );
							}
						}
					}
				});
				}
			});
		},
		createControl: function( n, cm ) {
		return null;
		}
	});
	tinymce.PluginManager.add( 'box_button_plugin', tinymce.plugins.box_button );
})();

/*********************
回り込みを解除
*********************/
(function() {
	tinymce.create('tinymce.plugins.clear_float_button', {
		init: function( editor, url ) {
			editor.addButton( 'clear_float', {
				title : '回り込み解除',
				image: url + '/images/note.png',
				cmd: 'clear_float_cmd'
			});
			editor.addCommand( 'clear_float_cmd', function() {
				return_text = '<br style="clear: both;">';
				editor.execCommand('mceInsertContent', 0, return_text);
			});
			},
		});
	tinymce.PluginManager.add( 'clear_float_button_plugin', tinymce.plugins.clear_float_button );
})();

/********************
点線
********************/
(function() {
	tinymce.create('tinymce.plugins.line_dotted_button', {
		init: function( editor, url ) {
			editor.addButton( 'line_dotted', {
				title : '点線',
				image: url + '/images/line_dotted.png',
				cmd: 'line_dotted_cmd'
			});
			editor.addCommand( 'line_dotted_cmd', function() {
				return_text = '<hr class="dotted" style="border-style:dotted;">';
				editor.execCommand('mceInsertContent', 0, return_text);
			});
			},
		});
	tinymce.PluginManager.add( 'line_dotted_button_plugin', tinymce.plugins.line_dotted_button );
})();

/********************
メモ書き
********************/
(function() {
	tinymce.create('tinymce.plugins.note_button', {
		init: function( editor, url ) {
			editor.addButton( 'note', {
				title : 'メモ書き',
				image: url + '/images/note.png',
				cmd: 'note_cmd'
			});
			editor.addCommand( 'note_cmd', function() {
				var selected_text = editor.selection.getContent();
				var return_text = '';
				return_text = '<div class="note"><div class="ttl">メモ</div>' + selected_text + '</div><p></p>';
				editor.execCommand('mceInsertContent', 0, return_text);
			});
		},
	});
	tinymce.PluginManager.add( 'note_button_plugin', tinymce.plugins.note_button );
})();

/********************
注意書き
********************/
(function() {
	tinymce.create('tinymce.plugins.alert_button', {
		init: function( editor, url ) {
			editor.addButton( 'alert', {
				title : '注意書き',
				image: url + '/images/alert.png',
				cmd: 'alert_cmd'
			});
			editor.addCommand( 'alert_cmd', function() {
				var selected_text = editor.selection.getContent();
				var return_text = '';
				return_text = '<div class="alert"><div class="ttl">注意</div>' + selected_text + '</div><p></p>';
				editor.execCommand('mceInsertContent', 0, return_text);
			});
		},
	});
	tinymce.PluginManager.add( 'alert_button_plugin', tinymce.plugins.alert_button );
})();

/********************
吹き出し
********************/
(function() {
	tinymce.create('tinymce.plugins.balloon_button', {
		init: function( editor, url ) {
			editor.addButton( 'balloon', {
				title : '吹き出し',
				image: url + '/images/balloon.png',
				onclick: function() {
					editor.windowManager.open({
					title: '吹き出し',
					body: [{
						type: 'textbox',
						name: 'name',
						label: '名前',
						tooltip: '画像の下に名前を挿入',
						},{
						type   : 'listbox',
						name   : 'image',
						label  : '画像',
						tooltip: '画像を選択',
						values : [
						{ text: 'メディアから画像をつかう', value: 'image_media' },
						{ text: 'プリセット画像1をつかう', value: 'image_1' },
						{ text: 'プリセット画像2をつかう', value: 'image_2' },
						{ text: 'プリセット画像3をつかう', value: 'image_3' }
						],
						value : 'image_media'
						},{
						type   : 'listbox',
						name   : 'position',
						label  : '画像位置',
						tooltip: '画像位置を選択',
						values : [
						{ text: '左', value: 'left' },
						{ text: '右', value: 'right' }
						],
						value : 'left'
					}],
					onsubmit: function( e ) {
						if(e.data.position == 'left') {
							if(e.data.image == 'image_media') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon left"><figure class="icon"><img src="' + $("#balloon-image-media").data("image") +'"><figcaption>' + e.data.name + '</figcaption></figure><div class="chat">' + selected_text + '</div></div><p></p>' );
							}
							else if(e.data.image == 'image_1') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon left"><figure class="icon"><img src="' + $("#balloon-image-1").data("image") +'"><figcaption>' + e.data.name + '</figcaption></figure><div class="chat">' + selected_text + '</div></div><p></p>' );
							}
							else if(e.data.image == 'image_2') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon left"><figure class="icon"><img src="' + $("#balloon-image-2").data("image") + '"><figcaption>' + e.data.name + '</figcaption></figure><div class="chat">' + selected_text + '</div></div><p></p>' );
							}
							else if(e.data.image == 'image_3') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon left"><figure class="icon"><img src="' + $("#balloon-image-3").data("image") + '"><figcaption>' + e.data.name + '</figcaption></figure><div class="chat">' + selected_text + '</div></div><p></p>' );
							}
						} else {
							if(e.data.image == 'image_media') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon right"><div class="chat">' + selected_text + '</div><figure class="icon"><img src="' + $("#balloon-image-media").data("image") + '"><figcaption>' + e.data.name + '</figcaption></figure></div><p></p>' );
							}
							else if(e.data.image == 'image_1') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon right"><div class="chat">' + selected_text + '</div><figure class="icon"><img src="' + $("#balloon-image-1").data("image") + '"><figcaption>' + e.data.name + '</figcaption></figure></div><p></p>' );
							}
							else if(e.data.image == 'image_2') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon right"><div class="chat">' + selected_text + '</div><figure class="icon"><img src="' + $("#balloon-image-2").data("image") + '"><figcaption>' + e.data.name + '</figcaption></figure></div><p></p>' );
							}
							else if(e.data.image == 'image_3') {
								var selected_text = editor.selection.getContent();
								editor.insertContent( '<div class="balloon right"><div class="chat">' + selected_text + '</div><figure class="icon"><img src="' + $("#balloon-image-3").data("image") + '"><figcaption>' + e.data.name + '</figcaption></figure></div><p></p>' );
							}
						}
					}
				});
				}
			});
		},
		createControl: function( n, cm ) {
		return null;
		}
	});
	tinymce.PluginManager.add( 'balloon_button_plugin', tinymce.plugins.balloon_button );
})();

/********************
引用
********************/
(function() {
	tinymce.create('tinymce.plugins.blockquote_button', {
		init: function( editor, url ) {
			editor.addButton( 'blockquote', {
				title : '引用',
				image: url + '/images/blockquote.png',
				onclick: function() {
					editor.windowManager.open({
					title: '引用',
					body: [{
						type: 'textbox',
						name: 'cite',
						label: '引用元',
						tooltip: '引用元の書籍名やサイト名を挿入',
						},{
						type: 'textbox',
						name: 'url',
						label: '引用元URL',
						tooltip: '引用元がサイトの場合にURLを挿入',
						}],
					onsubmit: function( e ) {
						if(e.data.url == false) {
						var selected_text = editor.selection.getContent();
						editor.insertContent( '<blockquote>' + selected_text + '<footer>引用：<cite>' + e.data.cite + '</cite></footer></blockquote><p></p>' );
						} else {
						var selected_text = editor.selection.getContent();
						editor.insertContent( '<blockquote cite="' + e.data.url + '">' + selected_text + '<footer>引用：<cite><a href="' + e.data.url + '" target="_blank">' + e.data.cite + '</a></cite></footer></blockquote><p></p>' );
						}
					}
				});
				}
			});
		},
		createControl: function( n, cm ) {
		return null;
		}
	});
	tinymce.PluginManager.add( 'blockquote_button_plugin', tinymce.plugins.blockquote_button );
})();
