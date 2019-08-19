(function ($) {
	if (!$) return;
	var ua = navigator.userAgent,
		isIE = ua.match(/msie/i),
		isIE6 = isIE && ua.match(/msie 6\./i),
		location = window.location,
		isHttpsScheme = location && location.protocol && location.protocol == 'https:';
	$.extend({
		amazon:{
			imageAttributes: ['SmallImage', 'MediumImage', 'LargeImage'],
			isCustomerReviewEnabled: false,
			isTrackEventEnabled: false,
			resource: {},
			initTemplate:function () {
				var r = this.resource;

				var linkOpenTag = '<a href="${DetailPageURL}" class="amazon_link" data-role="amazon_product" data-asin="${ASIN}" title="${Title}" target="_blank">';
				var smallImageTemplate =
					[
						'{{if SmallImage}}',
						'{{if $item.setInfoMargin(SmallImage.width+10)}}{{/if}}',
						'<div class="amazon_image">',
						linkOpenTag,
						'<img src="${SmallImage.src}" alt="${Title}"/>',
						'</a>',
						'</div>',
						'{{/if}}'
					].join('');
				var mediumImageTemplate =
					[
						'{{if MediumImage}}',
						'{{if $item.setInfoMargin(MediumImage.width+10)}}{{/if}}',
						'<div class="amazon_image">',
						linkOpenTag,
						'<img src="${MediumImage.src}" alt="${Title}"/>',
						'</a>',
						'</div>',
						'{{/if}}'
					].join('');
				var largeImageTemplate =
					[
						'{{if LargeImage}}',
						'{{if $item.setInfoMargin(LargeImage.width+10)}}{{/if}}',
						'<div class="amazon_image">',
						linkOpenTag,
						'<img src="${LargeImage.src}" alt="${Title}"/>',
						'</a>',
						'</div>',
						'{{/if}}'
					].join('');
				var imageTemplate =
					[
						'{{if _ShowSmallImage}}',smallImageTemplate,'{{/if}}',
						'{{if _ShowMediumImage}}',mediumImageTemplate,'{{/if}}',
						'{{if _ShowLargeImage}}',largeImageTemplate,'{{/if}}'
					].join('');

				var linkTemplate = linkOpenTag + '${Title}</a>';

				var priceContentTemplate =
					[
						'{{if $item.isSale()}}',
						'<b>' + r.ListPrice + '</b><span class="amazon_listprice">${ListPrice.FormattedPrice}</span><br/>',
						'{{if OfferSummary.LowestNewPrice}}<b>' + r.Price + '</b>${OfferSummary.LowestNewPrice.FormattedPrice}{{/if}}',
						'<span>' + r.PriceUpdatedat + '</span>',
						'{{else}}',
						'<b>' + r.Price + '</b>${ListPrice.FormattedPrice}',
						'<span>' + r.PriceUpdatedat + '</span>',
						'{{/if}}'
					].join('');
				var priceTemplate = '{{if ListPrice}}<div class="amazon_price" title="' + r.PriceUsage + '">' + priceContentTemplate + '</div>{{/if}}';
				var priceLiTemplate = '{{if ListPrice}}<li class="amazon_price" title="' + r.PriceUsage + '">' + priceContentTemplate + '</li>{{/if}}';
				var reviewLinkTemplate = '';
				if (this.isCustomerReviewEnabled) {
					reviewLinkTemplate = '<a href="${IFrameReviewURL}&TB_iframe=true&height=500&width=600" title="' + r.CustomerReviewTitle + '" target="_blank" class="amazon_review">' + r.SeeCustomerReviews + '</a>';
				}

				this.partial = {
					smallImage:smallImageTemplate,
					mediumImage:mediumImageTemplate,
					largeImage:largeImageTemplate,
					link:linkTemplate,
					price:priceTemplate
				};

				var defaultTemplates = {
					Small:[
						'<div class="amazon_item">',
						imageTemplate,
						'{{if _ShowDefaultImage}}',largeImageTemplate,'{{/if}}',
						'<div class="amazon_info">',
						'<div class="ttl">',linkTemplate,'</div>',
						'<ul>',
						'{{if Creator}}<li>${Creator}</li>{{/if}}',
						'{{if Manufacturer}}<li>${Manufacturer}</li>{{/if}}',
						priceLiTemplate,
						'{{if PublicationDate}}<li><b>' + r.PublicationDate + '</b>${PublicationDate}</li>{{/if}}',
						'{{if SalesRank}}<li><b>' + r.SalesRank + '</b>' + r.SalesRankValue + '</li>{{/if}}',
						'</ul>',
						'<a href="${DetailPageURL}" class="amazon_link" data-role="amazon_product" data-asin="${ASIN}" title="${Title}" target="_blank">Amazonで購入する</a>',
						'</div>',
						reviewLinkTemplate,
						'<div class="amazon_footer"></div>',
						'</div>'
					],
					Music:[
						'<div class="amazon_item amazon_music">',
						imageTemplate,
						'{{if _ShowDefaultImage}}',largeImageTemplate,'{{/if}}',
						'<div class="amazon_info">',
						'<div class="ttl">',linkTemplate,'</div>',
						'<ul>',
						'{{if Artist}}<li>${Artist}</li>{{/if}}',
						'{{if Creator}}<li>${Creator}</li>{{/if}}',
						'{{if Label}}<li>${Label}</li>{{/if}}',
						priceLiTemplate,
						'{{if ReleaseDate}}<li><b>' + r.ReleaseDate + '</b>${ReleaseDate}</li>{{/if}}',
						'{{if SalesRank}}<li><b>' + r.SalesRank + '</b>' + r.SalesRankValue + '</li>{{/if}}',
						'{{if RunningTime}}<li><b>' + r.RunningTime + '</b>' + r.RunningTimeValue + '</li>{{/if}}',
						'</ul>',
						'<a href="${DetailPageURL}" class="amazon_link" data-role="amazon_product" data-asin="${ASIN}" title="${Title}" target="_blank">Amazonで購入する</a>',
						'</div>',
						reviewLinkTemplate,
						'<div class="amazon_footer"></div>',
						'</div>'
					],
					DVD:[
						'<div class="amazon_item amazon_dvd">',
						imageTemplate,
						'{{if _ShowDefaultImage}}',largeImageTemplate,'{{/if}}',
						'<div class="amazon_info">',
						'<div class="ttl">',linkTemplate,'</div>',
						'<ul>',
						'{{if Director}}<li>${Director}</li>{{/if}}',
						'{{if Actor}}<li>${Actor}</li>{{/if}}',
						'{{if Label}}<li>${Label}</li>{{/if}}',
						priceLiTemplate,
						'{{if ReleaseDate}}<li><b>' + r.ReleaseDate + '</b>${ReleaseDate}</li>{{/if}}',
						'{{if SalesRank}}<li><b>' + r.SalesRank + '</b>' + r.SalesRankValue + '</li>{{/if}}',
						'{{if RunningTime}}<li><b>' + r.RunningTime + '</b>' + r.RunningTimeValue + '</li>{{/if}}',
						'</ul>',
						'<a href="${DetailPageURL}" class="amazon_link" data-role="amazon_product" data-asin="${ASIN}" title="${Title}" target="_blank">Amazonで購入する</a>',
						'</div>',
						reviewLinkTemplate,
						'<div class="amazon_footer"></div>',
						'</div>'
					],
					Book:[
						'<div class="amazon_item amazon_book">',
						imageTemplate,
						'{{if _ShowDefaultImage}}',largeImageTemplate,'{{/if}}',
						'<div class="amazon_info">',
						'<div class="ttl">',linkTemplate,'</div>',
						'<ul>',
						'{{if Author}}<li><b>' + r.BookAuthor + '</b>${Author}</li>{{/if}}',
						priceLiTemplate,
						'<li><b>' + r.BookPublicationDate + '</b>${PublicationDate}</li>',
						'{{if SalesRank}}<li><b>' + r.SalesRank + '</b>' + r.SalesRankValue + '</li>{{/if}}',
						'<li><b>${Binding}</b>' + r.NumberOfPagesValue + '</li>',
						'<li><b>ISBN-10</b>${ISBN}</li>',
						'<li><b>ISBN-13</b>${EAN}</li>',
						'<li><b>' + r.BookPublisher + '</b>${Publisher}</li>',
						'</ul>',
						'<a href="${DetailPageURL}" class="amazon_link" data-role="amazon_product" data-asin="${ASIN}" title="${Title}" target="_blank">Amazonで購入する</a>',
						'</div>',
						reviewLinkTemplate,
						'<div class="amazon_footer"></div>',
						'</div>'
					],
					eBooks:[
						'<div class="amazon_item amazon_book">',
						imageTemplate,
						'{{if _ShowDefaultImage}}',largeImageTemplate,'{{/if}}',
						'<div class="amazon_info">',
						'<div class="ttl">',linkTemplate,'</div>',
						'<ul>',
						'{{if Author}}<li><b>' + r.BookAuthor + '</b>${Author}</li>{{/if}}',
						priceLiTemplate,
						'<li><b>' + r.BookPublicationDate + '</b>${PublicationDate}</li>',
						'{{if SalesRank}}<li><b>' + r.SalesRank + '</b>' + r.SalesRankValue + '</li>{{/if}}',
						'<li><b>${Binding}</b>' + r.NumberOfPagesValue + '</li>',
						'<li><b>' + r.BookPublisher + '</b>${Publisher}</li>',
						'</ul>',
						'<a href="${DetailPageURL}" class="amazon_link" data-role="amazon_product" data-asin="${ASIN}" title="${Title}" target="_blank">Amazonで購入する</a>',
						'</div>',
						reviewLinkTemplate,
						'<div class="amazon_footer"></div>',
						'</div>'
					]
				};
				this.template(defaultTemplates);
				var me = this;
				$.each(this.addTemplateCallbacks, function (i, callback) {
					var t = callback.call(me, me.partial);
					if (t) me.template(t);
				});
			},
			addTemplateCallbacks:[],
			addTemplate:function (fn) {
				if (typeof(fn) == 'function') {
					this.addTemplateCallbacks.push(fn);
				}
			},
			template:function (templates) { // set up jQuery template
				$.each(templates, function (name, tmpl) {
					if (tmpl) {
						$.template('amazon' + name + 'Tpl', (typeof tmpl === 'string') ? tmpl : tmpl.join(''));
					}
				});
			},
			render:function (items) {
				var $items = [];
				this.initTemplate();
				$(".amazon_item").each(function () {
					var classNames = $(this).attr('class').split(' '),
						c = classNames[0].split('_'),
						asin = c[1],
						countryCode = c[2],
						tmpl = (c.length > 3) ? c[3] : null,
						item = find(asin, countryCode),
						imgSize = $(this).attr('data-img-size')
					;

					if (item) {
						item._ImageSize = imgSize || '';
						var $item = $.amazon.tmpl(item, $.amazon.formatTmplName(tmpl));
						$(this).replaceWith($item.hide());
						var $review = $item.find('.amazon_review');
						if (isIE6) {
							$item.css('position', 'static');
							$review.css({
								'float':'right',
								'position':'static',
								'marginRight':'32px'
							});
						}
						$review.click(function () {
							tb_show(this.title, this.href);
							this.blur();
							return false;
						});
						if ($.amazon.isTrackEventEnabled) {
							$item.find('.amazon_link').click(function() {
								try {
									var data = $(this).data();
									var title = $(this).attr('title');
									if (data.role == 'amazon_product') {
										if ($.isFunction(ga)) {
											ga('send', 'event', 'amazon', 'Click', data.asin + ' ' + title);
										} else if (_gaq) {
											_gaq.push(['_trackEvent', 'amazon', 'Click', data.asin + ' ' + title]);
										}
									}
								} catch (e) {
								}
							});
						}
						$items.push($item);
					} else {
						// add official link when amazon product is not fetched by using AWS API
						tmpl = 'Link' + countryCode.toUpperCase();
						item = {
							asins:asin,
							fc1:'000000',
							lc1:'0000FF',
							bc1:'000000',
							bg1:'FFFFFF',
							IS2:1,
							lt1:'_blank',
							f:'ifr',
							m:'amazon'
						};
						var $item = $.amazon.tmpl(item, $.amazon.formatTmplName(tmpl));
						$(this).replaceWith($item);
					}
				});

				function find(asin, countryCode) {
					for (var i = 0, length = items.length; i < length; i++) {
						if (items[i].ASIN == asin && items[i].CountryCode == countryCode) {
							return items[i];
						}
					}
				}
				if ($.amazon.isFadeInEnabled) {
					function fadeIn() {
						if ($items.length > 0) {
							var $item = $items.shift();
							$item.fadeIn();
							setTimeout(fadeIn, 100);
						}
					}
					fadeIn();
				} else {
					$.each($items, function() {
						this.show();
					});
				}
			},

			formatTmplName:function (key) {
				return (key) ? 'amazon' + key + 'Tpl' : null;
			},
			formatNumber:function (val) {
				val += '';
				var x = val.split('.'),
					x1 = x[0],
					x2 = x.length > 1 ? '.' + x[1] : '',
					rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
			},
			formatDateTime:function (timestamp) {
				var dt = new Date(timestamp * 1000);
				var Y = dt.getFullYear(),
					m = dt.getMonth() + 1,
					d = dt.getDate(),
					H = dt.getHours(),
					i = dt.getMinutes();
				if (m < 10) m = '0' + m;
				if (d < 10) d = '0' + d;
				if (H < 10) H = '0' + H;
				if (i < 10) i = '0' + i;
				return Y + '/' + m + '/' + d + ' ' + H + ':' + i;
			},
			getTemplate:function (item) {
				var defaultTmpl = this.formatTmplName('Small');
				if (item && item.ProductGroup) {
					var tmpl = this.formatTmplName(item.ProductGroup);
					return $.template[tmpl] || defaultTmpl;
				}
				return defaultTmpl;
			},
			prepareData:function (item) {

				// workaround: https://forums.aws.amazon.com/thread.jspa?messageID=435131
				if (isHttpsScheme) {
					$.each(this.imageAttributes, function(i, v) {
						var image = item[v];
						if (image && image.src) {
							image.src = image.src.replace('http://ecx.images-amazon.com', 'https://images-eu.ssl-images-amazon.com');
						}
					});
				}
				item._ShowDefaultImage = _ShowSmallImage = item._ShowMediumImage = item._ShowLargeImage = false;
				if (item._ImageSize == 'small') item._ShowSmallImage = true;
				else if (item._ImageSize == 'medium') item._ShowMediumImage = true;
				else if (item._ImageSize == 'large') item._ShowLargeImage = true;
				else item._ShowDefaultImage = true;
				item.PublicationDate = item.PublicationDate || item.ReleaseDate;
				item.Manufacturer = item.Manufacturer || item.Label;
				if (item.SalesRank) item.SalesRank = this.formatNumber(item.SalesRank);
				if (item.PublicationDate) item.PublicationDate = item.PublicationDate.replace(/-/g, '/');
				if (item.ReleaseDate) item.ReleaseDate = item.ReleaseDate.replace(/-/g, '/');
				if (item.Artist && item.Creator) {
					var Creator = [];
					var a = $.isArray(item.Artist) ? item.Artist : [item.Artist];
					var c = $.isArray(item.Creator) ? item.Creator : [item.Creator];
					$.each(c, function (i, value) {
						if ($.inArray(value, a) == -1) Creator.push(value);
					});
					item.Creator = (Creator.length) ? Creator : null;
				}
				item.UpdatedDate = this.formatDateTime(item.UpdatedAt);
				return item;
			},
			tmpl:function (item, tmpl) {
				item = this.prepareData(item);
				// overwrite ListPrice
				if (!item.ListPrice && item.OfferSummary) {
					item.ListPrice = item.OfferSummary.LowestNewPrice;
				}
				return $.tmpl($.template[tmpl] || this.getTemplate(item), item, {
					isSale:function () {
						if (this.data) {
							var lp = this.data.ListPrice, la = Number(lp.Amount),
								os = this.data.OfferSummary || {}, sp = os.LowestNewPrice || {}, sa = Number(sp.Amount);
							return (!isNaN(sa) && sa < la);
						}
						return false;
					},
					setInfoMargin: function(margin) {
						return this.data._InfoMarginLeft = margin;
					}
				});
			},
			execute: function() {
				var amazonVars = window.amazonVars;
				if (amazonVars) {
					function render() {
						if (!amazonVars.items) {
							return;
						}
						if ($.amazon.isExecuted) {
							return;
						}
						if (amazonVars.isCustomerReviewEnabled) {
							if (typeof tb_pathToImage === 'undefined') {
								tb_pathToImage = amazonVars.thickboxUrl + '/loadingAnimation.gif';
							}
							if (typeof tb_closeImage === 'undefined') {
								tb_closeImage = amazonVars.thickboxUrl + '/tb-close.png';
							}
						}
						$.amazon.isFadeInEnabled = amazonVars.isFadeInEnabled;
						$.amazon.isCustomerReviewEnabled = amazonVars.isCustomerReviewEnabled;
						$.amazon.isTrackEventEnabled = amazonVars.isTrackEventEnabled;
						$.amazon.resource = amazonVars.resource;
						$.amazon.template(amazonVars.regionTemplate);
						$.amazon.render(amazonVars.items);
						$.amazon.isExecuted = true;
					}
					if (amazonVars.isFadeInEnabled) {
						setTimeout(function () {
							render();
						}, 1000);
					} else {
						render();
					}
				}
			}
		}
	});
	$(document).ready(function(){
		$.amazon.execute();
	});
	$(window).load(function() {
		$.amazon.execute();
	});
	if (document.addEventListener) {
		document.addEventListener('DOMContentLoaded', function () {
			$.amazon.execute();
		});
	}
})(jQuery);