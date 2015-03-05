function hideNumber(text, offset) {
    void 0 == offset && (offset = 0);
    for (var disp = "", i = (String(text), text.length - offset); i > 0; i--) disp += "X";
    return disp + text.substr(text.length - offset)
}

function updatePageTitle(title) {
    var s_name = STORE_NAME;
    return title ? (s_name = STORE_NAME ? STORE_NAME : USER_NAME, document.title = title + " | " + decodeURIComponent(s_name), void(document.getElementsByName("twitter:title").length >= 1 && (document.getElementsByName("twitter:title")[0].content = title + " | " + decodeURIComponent(s_name)))) : (s_name = STORE_NAME ? STORE_NAME : USER_NAME, document.title = decodeURIComponent(s_name), void(document.getElementsByName("twitter:title").length >= 1 && (document.getElementsByName("twitter:title")[0].content = decodeURIComponent(s_name))))
}

function parseQueryString(url) {
    var query = {},
        splits = url.split("?");
    if (splits.length > 1) {
        var queries = splits.pop().split("#!")[0].replace(/\//, "").split("&"),
            len = queries.length;
        if (len > 0)
            for (var i = 0; len > i; ++i) {
                var _query = queries[i].split("=");
                query[_query[0]] = _query[1]
            }
    }
    return query
}

function referrer_save_market(flag) {
    var estore_reg = /park.jp/,
        makeshop_reg = /itempost.jp|valuecommerce.ne.jp|kuchikomi.jp|hikaku.com|e-pale.jp|seeq.ne.jp|myfave.jp|coneco.net|shopping.yourguide.co.jp/;
    document.referrer.match(/market.stores.jp\/yuzawaya/) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "yuzawaya",
        flag: flag
    }, {
        expires: 30
    })) : document.referrer.match(/market.zozo.jp/) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "zozo",
        flag: flag
    }, {
        expires: 30
    })) : document.referrer.match(/market.amifa.jp/) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "amifa",
        flag: flag
    }, {
        expires: 30
    })) : document.referrer.match(/market.toranoana.jp/) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "toranoana",
        flag: flag
    }, {
        expires: 30
    })) : document.referrer.match(/market.pass-the-baton.com/) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "passthebaton",
        flag: flag
    }, {
        expires: 30
    })) : document.referrer.match(/market.village-v.co.jp/) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "village_vanguard"
    }, {
        expires: 30
    })) : document.referrer.match(/exmarket.exblog.jp/) || document.referrer.match(/market.stores.jp\/exblog/) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "exblog",
        flag: flag
    }, {
        expires: 30
    })) : document.referrer.match(estore_reg) ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "estore",
        flag: flag
    }, {
        expires: 30
    })) : document.referrer.match(makeshop_reg) && (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "makeshop",
        flag: flag
    }, {
        expires: 30
    }))
}

function setCookiePromotion(url, flag) {
    var query = parseQueryString(url);
    "pr_ecnavi" === query.via ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "ecnavi",
        id: query.id,
        flag: flag
    }, {
        expires: 30
    })) : "mb" === query.via ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "message_bird",
        flag: flag
    }, {
        expires: 30
    })) : "pr_gunosy" === query.via ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "gunosy",
        flag: flag
    }, {
        expires: 30
    })) : "snapeee" === query.via ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "snapeee",
        flag: flag
    }, {
        expires: 30
    })) : "zozo" === query.market_key ? (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "zozo",
        flag: flag
    }, {
        expires: 30
    })) : "sumally" === query.via && (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "sumally",
        flag: flag
    }, {
        expires: 30
    })), referrer_save_market(flag), set_from_exblog()
}

function set_from_exblog() {
    var pra = get_url_vars();
    "exblog_item" == pra.via && (jQuery.cookie.json = !0, jQuery.cookie("promotion", {
        via: "exblog_item"
    }, {
        expires: 30
    }))
}

function get_url_vars() {
    for (var params, vars = new Object, temp_params = window.location.search.substring(1).split("&"), i = 0; i < temp_params.length; i++) params = temp_params[i].split("="), vars[params[0]] = params[1];
    return vars
}

function EmailsController($scope, $resource, $location, $routeParams) {
    $scope.htmlEncode = function(value) {
        return value ? $("<div />").text(value).html() : ""
    };
    var email = $resource("/store/:store_name/emails/:id", {}, {
        show: {
            method: "GET",
            params: {
                store_name: USER_NAME,
                id: $routeParams.id
            }
        }
    });
    angular.extend($scope, {
        show: function() {
            email.show(function(data) {
                data.follow && $("iframe:first").remove(), $(".follow_box").remove(), $scope.email = data, $("#template").load(function() {
                    var name = STORE_NAME ? decodeURIComponent(STORE_NAME) : USER_NAME,
                        url = $location.protocol() + "//" + $location.host();
                    0 === $scope.email.fmt ? ($("#template").contents().find(".store_name").html(name), $("#template").contents().find(".store_url").html(url), $("#template").contents().find("#email_id").html($scope.email._id)) : ($("#template").contents().find("#home").attr("href", "#"), $("#template").contents().find("#mail").attr("href", "#"), $("#template").contents().find("#unsubscribes").attr("href", "#"), $("#template").contents().find("#home").html(name));
                    var i = 0;
                    do {
                        var str = $scope.htmlEncode($scope.email.contents[i].b);
                        $("#template").contents().find("#body" + i).html(str.replace(/\r\n/g, "<br />").replace(/(\n|\r)/g, "<br />")), (0 !== i || 0 !== $scope.email.fmt) && (str = $scope.htmlEncode($scope.email.contents[i].h), $("#template").contents().find("#head" + i).html(str.replace(/\r\n/g, "<br />").replace(/(\n|\r)/g, "<br />")), $scope.email.contents[i].image ? (img_name = $scope.email.contents[i].image.n.split("."), src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + img_name[0] + "_" + $scope.email.contents[i].image.w + "x" + $scope.email.contents[i].image.h + "x" + Math.abs($scope.email.contents[i].image.ox) + "x" + Math.abs($scope.email.contents[i].image.oy) + "." + img_name[1]) : src = "/images/mailmagazine/spacer.gif", $("#template").contents().find("#image" + i).load(function() {
                            $("#template").attr("width", "600"), $("#template").attr("height", $("#template").contents().height()), $scope.$$phase || $scope.$digest()
                        }).attr("src", src))
                    } while (++i < $scope.email.fmt);
                    $("#template").attr("width", "600"), $("#template").attr("height", $("#template").contents().height()), $scope.$$phase || $scope.$digest()
                }).attr("src", "/emails/" + $scope.email.fmt)
            }, function() {
                $scope.not_found = !0
            })
        }
    })
}

function ItemsController($scope, $resource, $location, $routeParams, $http, $rootElement, $rootScope, checkout, $q, $window, StoresUtil, analytics, optimizely, $timeout, creditCard, storesJpAddonUtility, CurrentUser) {
    twttr.events.bind("none", function() {});
    var Item = $resource("/items/:item_id", {}, {
        index: {
            method: "GET",
            isArray: !0
        },
        show: {
            method: "GET",
            params: {
                item_id: $routeParams.item_id,
                isArray: !0
            }
        }
    });
    $rootScope.hide_logo = !1, $scope.via = "premium" === STORES_JP.plan ? "shop_premium" : "shop", $scope.item_id = $routeParams.item_id, $scope.stores_domain = STORES_JP.stores_domain, angular.extend($scope, {
        current_url: encodeURIComponent(location.href),
        index: function() {
            $scope.user_name = USER_NAME;
            var origin = location.protocol + "//" + location.hostname;
            $scope.tw_url = encodeURIComponent(origin), $scope.original_domain = !1, origin.split(".stores.jp").length > 1 || ($scope.original_domain = !0);
            var via = null;
            if (splits = location.href.split("?via="), splits.length > 1) via = splits.pop();
            else {
                var referrer = document.referrer.split("?via=");
                referrer.length > 1 && (via = referrer.pop())
            }
            var mobile_flag = StoresUtil.is_mobile();
            if (setCookiePromotion(location.href, STORES_JP.promotion_enabled), $scope.show_sticker = storesJpAddonUtility.isEnableAddon("sticker"), $http.get("/store/" + USER_NAME + "/about_detail").success(function(data) {
                    var metaDesc = angular.element($rootElement.find("meta[name=description]")[0]),
                        metaKeyWd = angular.element($rootElement.find("meta[name=Keywords]")[0]),
                        metaTwiDesc = angular.element($rootElement.find("meta[name=twitter\\:description]")[0]);
                    metaDesc.attr("content", data.detail), metaKeyWd.attr("content", data.detail + ", \u30aa\u30f3\u30e9\u30a4\u30f3\u30b9\u30c8\u30a2, \u30cd\u30c3\u30c8\u30b7\u30e7\u30c3\u30d7, EC, \u30aa\u30f3\u30e9\u30a4\u30f3\u30b7\u30e7\u30c3\u30d7, \u30cd\u30c3\u30c8\u901a\u8ca9, \u30cd\u30c3\u30c8\u8ca9\u58f2"), metaTwiDesc.attr("content", data.detail)
                }), $scope.I18n = I18n, updatePageTitle(), $scope.preset = {
                    layouts: [{
                        name: "layout_a",
                        first: "205x205",
                        other: "205x205",
                        first_width: "205",
                        first_height: "205",
                        other_width: "205",
                        other_height: "205"
                    }, {
                        name: "layout_b",
                        first: "300x300",
                        other: "300x300",
                        first_width: "300",
                        first_height: "300",
                        other_width: "300",
                        other_height: "300"
                    }, {
                        name: "layout_c",
                        first: "450x450",
                        other: "450x450",
                        first_width: "450",
                        first_height: "450",
                        other_width: "450",
                        other_height: "450"
                    }, {
                        name: "layout_h",
                        first: "120x120",
                        other: "120x120",
                        first_width: "120",
                        first_height: "120",
                        other_width: "120",
                        other_height: "120"
                    }, {
                        name: "layout_d",
                        first: "420x200",
                        other: "190x190",
                        first_width: "420",
                        first_height: "200",
                        other_width: "190",
                        other_height: "190"
                    }, {
                        name: "layout_e",
                        first: "420x420",
                        other: "180x180",
                        first_width: "400",
                        first_height: "400",
                        other_width: "180",
                        other_height: "180"
                    }, {
                        name: "layout_f",
                        first: "400x400",
                        other: "400x400",
                        first_width: "400",
                        first_height: "400",
                        other_width: "400",
                        other_height: "400"
                    }, {
                        name: "layout_g",
                        first: "400x200",
                        other: "400x200",
                        first_width: "400",
                        first_height: "200",
                        other_width: "400",
                        other_height: "200"
                    }]
                }, $("html").addClass(uaName), $scope.mobile_flag = mobile_flag, 1 == mobile_flag) {
                var img_size = document.documentElement.clientWidth / 2 - 20;
                $scope.preset = {
                    layouts: [{
                        name: "layout_a",
                        first: "200x200",
                        other: "200x200",
                        first_width: img_size,
                        first_height: img_size,
                        other_width: img_size,
                        other_height: img_size
                    }]
                }
            }
            var extendData = {};
            STORES_JP.instead_referer && (extendData.instead_referer = STORES_JP.instead_referer, delete STORES_JP.instead_referer), $routeParams.category && (extendData.category_id = $routeParams.category, $scope.category = $routeParams.category, updatePageTitle($routeParams.category));
            console.log($routeParams)
            var last_page = !1;
            $("#store_footer").hide(), $scope.footerFixed = function(last) {
                last || "true" != $("input[name=footer_fixed]")[0].value ? ($("#store_footer").show(), $("#store_footer").css("position", "relative"), $("#store_footer").css("background-color", "transparent"), last_page = !0) : ($("#store_footer").css("position", "fixed"), $(function() {
                    $(window).scroll(function() {
                        $("#store_footer").show(), scrollHeight = $(document).height(), scrollPosition = $(window).height() + $(window).scrollTop(), footHeight = $("#store_footer").height(), scrollPosition >= scrollHeight ? last_page && $("#store_footer").css("background-color", "transparent") : $(this).scrollTop() < 100 ? $("#store_footer").hide().slideUp("fast") : ($("#store_footer").css("background-color", "rgba(255,255,255,0.6)"), $("#store_footer").css("position", "fixed"))
                    })
                }))
            }, extendData.page = $scope.currentPage, extendData.mobile = mobile_flag, $http.get("/items_pager", {
                params: extendData
            }).success(function(data) {
                $scope.footerFixed(data["last_page?"]), $scope.disable_flag = !0, $scope.items = data.items, $scope.cnt_items = data.cnt_items, $scope.cnt_pages = data.cnt_pages, $scope.styles.display.item || setTimeout(function() {
                    $("#item_list").addClass("hover_style"), $(".items").each(function() {
                        $(this).find(".data").css({
                            display: "none"
                        }), $(this).bind("mouseenter", function() {
                            $(this).find(".data").fadeIn(200)
                        }).bind("mouseleave", function() {
                            $(this).find(".data").fadeOut(200)
                        })
                    })
                }, 0);
                var layout = _.find($scope.preset.layouts, function(l) {
                    return l.name == $scope.styles.layout
                });
                _.each($scope.items, function(v, k) {
                    var image_name = v.images[0].name.split(".");
                    //k ? (v.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_" + layout.other + "." + image_name[1], v.images[0].width = layout.other_width, v.images[0].height = layout.other_height) : (v.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_" + layout.first + "." + image_name[1], v.images[0].width = layout.first_width, v.images[0].height = layout.first_height)
                  k ? (v.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "." + image_name[1], v.images[0].width = layout.other_width, v.images[0].height = layout.other_height) : (v.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "." + image_name[1], v.images[0].width = layout.first_width, v.images[0].height = layout.first_height)
                }), setTimeout(function() {
                    $("dd.name").tile();
                    var pagenBtn = $(".pagenation");
                    pagenBtn.hide(), $(window).scroll(function() {
                        $(this).scrollTop() > 100 && $scope.items.length >= 48 || $scope.mobile_page_cnt > 1 ? pagenBtn.fadeIn() : pagenBtn.fadeOut()
                    }), (window.innerHeight - $("html").height() >= 0 || 1 == ie_flag) && $scope.items.length < $scope.cnt_items && $scope.page_scroll()
                }, 50), $scope.cart.sum(), $scope.cart.refresh_quantity(), $scope.disable_flag = !1
            }), $scope.category_click = function(param) {
                $location.url("/?category=" + encodeURIComponent(param))
            }, $scope.mobile_page_cnt = 1, $scope.search = function(page) {
                $scope.disable_flag = !0, $scope.currentPage = page;
                //console.log($scope.category)
                var params = {
                    page: $scope.currentPage,
                    category_id: $scope.category,
                    mobile: mobile_flag,
                    isArray: !0
                };
                //console.log(params);
                $http.get("/items_pager", {
                    params: params
                }).success(function(data) {
                    $scope.footerFixed(data["last_page?"]), $scope.cnt_items = data.cnt_items, $scope.cnt_pages = data.cnt_pages;
                    var items = data.items;
                    $scope.styles.display.item || setTimeout(function() {
                        $("#item_list").addClass("hover_style"), $(".items").each(function() {
                            $(this).find(".data").css({
                                display: "none"
                            }), $(this).bind("mouseenter", function() {
                                $(this).find(".data").fadeIn(200)
                            }).bind("mouseleave", function() {
                                $(this).find(".data").fadeOut(200)
                            })
                        })
                    }, 0);
                    var layout = _.find($scope.preset.layouts, function(l) {
                        return l.name == $scope.styles.layout
                    });
                    _.each(items, function(v) {
                        var image_name = v.images[0].name.split(".");
                        //v.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_" + layout.other + "." + image_name[1], v.images[0].width = layout.other_width, v.images[0].height = layout.other_height
                        v.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "." + image_name[1], v.images[0].width = layout.other_width, v.images[0].height = layout.other_height
                    }), null == $scope.items ? $scope.items = items : 1 == $scope.mobile_nextpage_btn ? ($scope.items = null, $scope.items = items) : $scope.items = $scope.items.concat(items), $scope.disable_flag = !1, $scope.pagerdisplaycontrol(), $scope.mobile_nextpage_btn = !1, setTimeout(function() {
                        $("dd.name").tile()
                    }, 50), $scope.range(), (window.innerHeight - $("html").height() >= 0 || 1 == ie_flag) && $scope.items.length < $scope.cnt_items && $scope.page_scroll()
                }).error(function() {
                    delete $scope.items, $scope.range(), $scope.disable_flag = !1
                })
            }, $scope.pagerdisplaycontrol = function() {
                1 == $scope.mobile_page_cnt ? $("#perpager").addClass("disabled") : $("#perpager").removeClass("disabled");
                var i = Math.ceil($scope.cnt_items / 48);
                $scope.mobile_page_cnt == i ? $("#nextpager").addClass("disabled") : $("#nextpager").removeClass("disabled")
            }, $scope.range = function() {
                var i = 1,
                    j = Math.floor($scope.pageDisplay / 2);
                $scope.pagenations = [], $scope.currentPage > j && (i = $scope.currentPage - j, $scope.cnt_pages - $scope.pageDisplay < i && (i = $scope.cnt_pages - $scope.pageDisplay + 1));
                for (var k = i + $scope.pageDisplay; k > i && ($scope.pagenations.push(i), i != $scope.cnt_pages); i++);
            }, $scope.range(), $scope.mobile_nextpage_btn = !1, $scope.prevPage = function() {
                if (1 != $scope.mobile_page_cnt && !$scope.disable_flag && $scope.currentPage > 1) {
                    var z = $scope.mobile_page_cnt - 2;
                    0 >= z && (z = 0), page = 6 * z + 1, $scope.currentPage = page, $scope.items = null, $scope.mobile_page_cnt = $scope.mobile_page_cnt - 1, $scope.search(page)
                }
            }, $scope.mobile_nextPage = function() {
                if ($scope.mobile_nextpage_btn = !0, !$scope.disable_flag) {
                    var i = Math.ceil($scope.cnt_items / 48);
                    $scope.mobile_page_cnt != i && ($scope.mobile_page_cnt = $scope.mobile_page_cnt + 1, $("body,html").animate({
                        scrollTop: 0
                    }, "fast"), $scope.nextPage())
                }
            }, $scope.nextPage = function() {
                if ($scope.currentPage < $scope.cnt_pages || $scope.items.length >= 48 && 1 == $scope.mobile_flag) {
                    var page = $scope.currentPage + 1;
                    $scope.search(page)
                } else $scope.disable_flag = !1
            }, $scope.currentPage = 1, $scope.page_scroll = function() {
                void 0 != $scope.items && ($scope.disable_flag || 1 == $scope.mobile_flag && $scope.items.length >= 48 || ($scope.disable_flag = !0, $scope.nextPage()))
            }, $scope.disable_flag = !1
        },
        show: function() {
            var setViaMarketData = function() {
                var params = $location.search(),
                    stock_key = params.stock_key,
                    market_key = params.market_key;
                if (stock_key && $http.get("/items/" + $scope.item.id + "/stocks?stock_key=" + stock_key).success(function(stocks) {
                        $scope.stocks = stocks, $scope.cart.add($scope.item, $scope.stocks, market_key), market_key ? $location.path("/checkout").search("market_key=" + market_key) : $location.path("/checkout")
                    }), market_key) {
                    var baseUrl = "";
                    switch (market_key) {
                        case "zozo":
                            baseUrl = "http://market.zozo.jp";
                            break;
                        case "amifa":
                            baseUrl = "http://market.amifa.jp";
                            break;
                        case "toranoana":
                            baseUrl = "http://market.toranoana.jp";
                            break;
                        case "passthebaton":
                            baseUrl = "http://market.pass-the-baton.com";
                            break;
                        case "village-vanguard":
                            baseUrl = "http://market.village-v.co.jp";
                            break;
                        case "exblog":
                            baseUrl = "http://exmarket.exblog.jp";
                            break;
                        case "parco":
                            baseUrl = "http://kaeru.parco.jp";
                            break;
                        default:
                            baseUrl = "https://market.stores.jp/" + market_key
                    }
                    $scope.market_back_url = baseUrl + "/#!/store/" + USER_NAME + "/items/" + $scope.item.id
                }
            };
            $rootScope.hide_logo = !0, $scope.loading = !0, $scope.user_name = USER_NAME, $scope.item_image_limit = storesJpAddonUtility.isEnableAddon("item_image_limit");
            var origin = location.protocol + "//" + location.hostname;
            FB.init({
                appId: "106518812838112",
                status: !0,
                cookie: !0
            }), $scope.fb_url = origin + "/#!/items/" + $routeParams.item_id, $scope.tw_url = encodeURIComponent($scope.fb_url), $scope.original_domain = !1, origin.split(".stores.jp").length > 1 || ($scope.original_domain = !0), $scope.show_sticker = storesJpAddonUtility.isEnableAddon("sticker"), setCookiePromotion(location.href, STORES_JP.promotion_enabled), $scope.I18n = I18n, $scope.mall = STORES_JP.mall;
            var extendData = {};
            STORES_JP.instead_referer && (extendData.instead_referer = STORES_JP.instead_referer, delete STORES_JP.instead_referer), Item.show(extendData, function(data) {
                $scope.$root.item = data;
                var metaDesc = angular.element($rootElement.find("meta[name=description]")[0]),
                    metaKeyWd = angular.element($rootElement.find("meta[name=Keywords]")[0]),
                    metaTwiDesc = angular.element($rootElement.find("meta[name=twitter\\:description]")[0]),
                    item_keywords = data.name;
                if (data.description && (item_keywords = data.name + ", " + data.description), metaDesc.attr("content", item_keywords), metaKeyWd.attr("content", item_keywords + ", \u30aa\u30f3\u30e9\u30a4\u30f3\u30b9\u30c8\u30a2, \u30cd\u30c3\u30c8\u30b7\u30e7\u30c3\u30d7, EC, \u30aa\u30f3\u30e9\u30a4\u30f3\u30b7\u30e7\u30c3\u30d7, \u30cd\u30c3\u30c8\u901a\u8ca9, \u30cd\u30c3\u30c8\u8ca9\u58f2"), metaTwiDesc.attr("content", item_keywords), $scope.tweet_item_name = encodeURI($scope.item.name).replace("&", "%26"), $scope.item.digital_contents && ($scope.item.is_digit = !0), $scope.title = encodeURIComponent(updatePageTitle(data.title)), $scope.item_images = [], _.each($scope.item.images, function(image) {
                        var image_name = image.name.split(".");
                        //image.original_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image.name, image.sp_big_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_500x0." + image_name[1], image.preview_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_460x460." + image_name[1], image.thumb_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_80x80." + image_name[1], $scope.item_images.push(image.preview_src)
                        image.original_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image.name, image.sp_big_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_500x0." + image_name[1], image.preview_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "." + image_name[1], image.thumb_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "." + image_name[1], $scope.item_images.push(image.preview_src)
                    }), $scope.main_image = $scope.item.images[0], !$scope.item_image_limit && $scope.item.images.length > 4 && $scope.item.images.splice(4, $scope.item.images.length - 4), $scope.item.images.length > 4) {
                    var image_groups = [],
                        idx = 0,
                        slide_thumbnail_pages = Math.ceil($scope.item.images.length / 5);
                    _.times(slide_thumbnail_pages, function() {
                        for (var images = [], i = 0; 5 > i && idx < $scope.item.images.length; i++) images.push($scope.item.images[idx]), idx++;
                        image_groups.push(images)
                    }), $scope.item.image_groups = image_groups;
                    var Slider = function(trg, btn) {
                        this.$slide = trg, this.$control = btn, this.width = this.$slide.children().width(), this.direction = "right", this.$current, this.$next
                    };
                    Slider.prototype = {
                        init: function() {
                            var that = this;
                            this.$slide.children().each(function(i) {
                                0 === i ? that.$current = $(this) : $(this).css("left", that.width)
                            }), this.setControl()
                        },
                        actionSlide: function() {
                            var that = this;
                            this.$slide.data("sliding", !0), this.$current.stop().animate({
                                left: ("left" === this.direction ? "-=" : "+=") + this.width + "px"
                            }, 200), this.$next.stop().animate({
                                left: "0px"
                            }, 200, function() {
                                that.$current = that.$next, that.$slide.data("sliding", !1)
                            })
                        },
                        rePosition: function() {
                            this.$slide.data("sliding") || ("right" === this.direction ? (0 !== this.$current.prevAll().length ? (this.$next = this.$current.prev(), 1 === this.$current.prevAll().length ? this.$control.find(".prev").addClass("none") : this.$control.find(".prev").removeClass("none")) : this.$next = this.$current.parent().children().last(), this.$next.css({
                                left: -this.width + "px"
                            }), this.$control.find(".next").removeClass("none")) : (0 !== this.$current.nextAll().length ? (this.$next = this.$current.next(), 1 === this.$current.nextAll().length ? this.$control.find(".next").addClass("none") : this.$control.find(".next").removeClass("none")) : this.$next = this.$current.parent().children().first(), this.$next.css({
                                left: this.width + "px"
                            }), this.$control.find(".prev").removeClass("none")), this.actionSlide())
                        },
                        setControl: function() {
                            var that = this;
                            this.$control.find(".prev").on("click", function() {
                                0 !== that.$current.prevAll().length && (that.direction = "right", that.rePosition())
                            }), this.$control.find(".next").on("click", function() {
                                0 !== that.$current.nextAll().length && (that.direction = "left", that.rePosition())
                            })
                        }
                    }, setTimeout(function() {
                        var slider = new Slider($(".slide_wrap"), $(".slide_navi"));
                        slider.init()
                    }, 0)
                }
                $scope.restock_pop = function(variation) {
                        $scope.restock_finished = $scope.invalid_email = $scope.restock_exists = $scope.restock_error = !1, $scope.selectedVariation = variation
                    }, $scope.restock_submit_clicked = !1, $scope.restock_submit = function(restock_email_address) {
                        if (!restock_email_address) return void($scope.invalid_email = !0);
                        $scope.restock_submit_clicked = !0;
                        var data = {
                            email: restock_email_address,
                            item: $scope.item,
                            quantity: $scope.selectedVariation
                        };
                        $http.post("/restock_notice", {
                            data: data
                        }).success(function(res) {
                            $scope.restock_submit_clicked = !1, "success" == res.msg && ($scope.restock_finished = !0), "exist" == res.msg && ($scope.restock_exists = !0, $scope.restock_submit_clicked = !1), "failed" == res.msg && ($scope.restock_error = !0, $scope.restock_submit_clicked = !1)
                        }).error(function() {
                            $scope.restock_submit_clicked = !1, $scope.restock_error = !0
                        })
                    }, setTimeout(function() {
                        $("#item_description").autolink("_blank"), $("#default-review").raty({
                            score: function() {
                                return $(this).attr("data-score")
                            },
                            readOnly: !0,
                            width: 200,
                            height: 16
                        }), $("#default-review-sp").raty({
                            score: function() {
                                return $(this).attr("data-score")
                            },
                            readOnly: !0,
                            width: 210,
                            height: 16
                        })
                    }, 0), $scope.showShippingFee = function(opposite) {
                        var res;
                        return res = angular.equals($rootScope.shipping_fee.type, "fix") ? $rootScope.shipping_fee.default_shipping_fee > 0 ? $rootScope.shipping_fee.free_shipping && $scope.item.price > $rootScope.shipping_fee.free_shipping ? !1 : !0 : !1 : angular.equals($rootScope.shipping_fee.type, "delivery_method") && $scope.item.delivery_method ? !0 : $scope.item.shipping_fee > 0 ? !0 : !1, opposite ? !res : res
                    },
                    function($) {
                        var og_image = $('meta[property="og:image"]'),
                            og_image_secure_url = $('meta[property="og:image:secure_url"]'),
                            twitter_image_src = $('meta[name="twitter:image:src"]');
                        og_image.length ? (og_image.attr("content", $scope.main_image.original_src), og_image_secure_url.attr("content", $scope.main_image.original_src), twitter_image_src.attr("content", $scope.main_image.original_src)) : $("head").append($("<meta>").attr({
                            property: "og:image",
                            content: $scope.main_image.original_src
                        }).after($("<meta>").attr({
                            property: "og:image:secure_url",
                            content: $scope.main_image.original_src
                        })).after($("<meta>").attr({
                            name: "twitter:image:src",
                            content: $scope.main_image.original_src
                        })))
                    }(jQuery),
                    function() {
                        $scope.total_quantity = 0, $scope.stocks = {}, $scope.item.quantities.length > 1 ? _.each($scope.item.quantities, function(quantity) {
                            quantity.q_array = new Array(quantity.quantity + 1), $scope.stocks[quantity.variation] = 0, $scope.padding = 0, $scope.total_quantity += quantity.quantity
                        }) : ($scope.item.quantities[0].q_array = new Array($scope.item.quantities[0].quantity), $scope.stocks[null] = 1, $scope.padding = 1, $scope.total_quantity += $scope.item.quantities[0].quantity), $scope.loading = !1, setViaMarketData()
                    }()
            }, function() {
                $scope.not_found = !0
            }), $scope.select_image = function(image) {
                $scope.main_image = image
            }, $scope.category_click = function(param) {
                $scope.categoriesselected = encodeURIComponent(param), $location.url("/?category=" + encodeURIComponent(param))
            }, $scope.postToFeed = function(referral_url) {
                function callback(response) {
                    response && analytics.event("item", "share", "facebook")
                }
                var obj = {
                    method: "feed",
                    redirect_uri: "https://store.jp",
                    link: referral_url,
                    picture: $scope.main_image.thumb_src,
                    name: $scope.item.name,
                    caption: $scope.item.name,
                    description: $scope.item.description
                };
                FB.ui(obj, callback)
            }, twttr.events.unbind("tweet"), twttr.events.bind("tweet", function() {
                analytics.event("item", "share", "twitter")
            })
        },
        show_cart: function() {
            $rootScope.hide_logo = !0, $scope.I18n = I18n
        },
        checkout: function() {
            $(".fancybox-close").click(), $rootScope.hide_logo = !0, $scope.$root.step = 1;
            var market_key = $routeParams.market_key;
            "zozo" == market_key ? $scope.market_back_url = "http://market.zozo.jp/#!/store/" + USER_NAME + "/items/" + $scope.cart.items[0].item_id : "amifa" == market_key ? $scope.market_back_url = "http://market.amifa.jp/#!/store/" + USER_NAME + "/items/" + $scope.cart.items[0].item_id : "toranoana" == market_key ? $scope.market_back_url = "http://market.toranoana.jp/#!/store/" + USER_NAME + "/items/" + $scope.cart.items[0].item_id : "passthebaton" == market_key ? $scope.market_back_url = "http://market.pass-the-baton.com/#!/store/" + USER_NAME + "/items/" + $scope.cart.items[0].item_id : "parco" == market_key ? $scope.market_back_url = "http://kaeru.parco.jp/#!/store/" + USER_NAME + "/items/" + $scope.item.id : market_key && ($scope.market_back_url = "https://market.stores.jp/" + market_key + "/#!/store/" + USER_NAME + "/items/" + $scope.cart.items[0].item_id), $scope.cart.items.length || ($location.path("/"), $location.replace()), $scope.I18n = I18n, $scope.enableGiftAddon = storesJpAddonUtility.isEnableAddon("gift_form"), $scope.enablereceiveMethodAddon = storesJpAddonUtility.isEnableAddon("receive_method");
            "en" === I18n.locale ? "Please select" : "\u9078\u629e\u3057\u3066\u304f\u3060\u3055\u3044";
            $scope.preset = {
                prefectures: [I18n.nonSelect].concat(I18n.prefectures),
                cc: {
                    expires: {
                        years: function() {
                            var y = (new Date).getFullYear();
                            return _.range(y, y + 12)
                        }(),
                        months: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                }
            }, $scope.enablereceiveMethodAddon && ($scope.preset.receive_methods = [{
                key: "-",
                value: I18n.nonSelect
            }], $http.get("/receive_methods").success(function(data) {
                $scope.receive_methods = data.receive_methods, _.each($scope.receive_methods, function(receive_method) {
                    $scope.preset.receive_methods.push({
                        key: receive_method,
                        value: $scope.I18n.receiveMehtods[receive_method]
                    })
                })
            })), $scope.$root.customer || ($scope.customer = {
                cc: {
                    company: void 0,
                    number: void 0,
                    name: void 0,
                    security_code: void 0,
                    expires: {
                        year: $scope.preset.cc.expires.years[0],
                        month: $scope.preset.cc.expires.months[11]
                    }
                },
                prefecture: $scope.preset.prefectures[0],
                signup_terms: !0,
                login: !1
            }, $scope.enablereceiveMethodAddon && ($scope.customer.receive_method = $scope.preset.receive_methods[0]), storesJpAddonUtility.isEnableAddon("follow") === !0 ? CurrentUser.then(function() {
                $scope.customer.login = !0, $scope.customer.signup_terms = !1, $scope.address_change_text = "Đồng ý với nội dung trên", "ja" === I18n.locale && $http.get("/profile_address").success(function(address) {
                    $scope.customer.email = address.email, $scope.customer.email2 = address.email, address.zip && (angular.extend($scope.customer, address), $scope.address_change_text = "\u4e0a\u8a18\u306e\u5185\u5bb9\u3067\u4f4f\u6240\u3092\u5909\u66f4\u3057\u3066\u4fdd\u5b58\u3059\u308b")
                }), $http.get("/user_cc").success(function(cc) {
                    $scope.customer.cc_info = cc, $scope.customer.use_registered_cc = !0
                })
            }) : delete $scope.customer.signup_terms), $scope.$root.error && (delete $scope.$root.error, $scope.error = !0), $http.get("/store/" + USER_NAME + "/enable_coupon").success(function(res) {
                "true" == res && ($scope.enable_coupon = !0)
            }), $scope.$root.misc ? $scope.payment_methods = $scope.$root.misc.payment_methods : $q.all([$http.get("/store/" + USER_NAME + "/payment_methods"), $http.get("/payment_maintenance")]).then(function(results) {
                var payment_methods = results[0].data;
                if ("en" == I18n.locale || $scope.cart.items[0].digital_contents) payment_methods = {
                    credit: 0
                };
                else if ($scope.cart.items[0].mybook_item)
                    for (var payment_method in payment_methods) "credit" !== payment_method && "convenience_store_payment" !== payment_method && delete payment_methods[payment_method];
                else {
                    var available_payment_methods = Object.keys(I18n.paymentMethods);
                    angular.forEach(payment_methods, function(fee, payment_method) {
                        $.inArray(payment_method, available_payment_methods) < 0 && delete payment_methods[payment_method]
                    })
                }
                $scope.payment_maintenance = results[1].data, $scope.payment_maintenance.convenience_store_payment && void 0 != payment_methods.convenience_store_payment && ($scope.payment_maintenance_flag = !0, delete payment_methods.convenience_store_payment), $scope.payment_maintenance.credit && delete payment_methods.credit, $scope.payment_methods = [], Object.keys(payment_methods).length > 1 && $scope.payment_methods.push(["-", I18n.nonSelect, 0]), angular.forEach(payment_methods, function(fee, payment_method) {
                    $scope.payment_methods.push([payment_method, I18n.paymentMethods[payment_method], fee])
                }), $scope.customer.payment_method = $scope.payment_methods[0], "-" !== $scope.customer.payment_method[0] && $scope.cart.sum()
            }), $scope.is_field_invalid = function(field, dirty) {
                var invalid = field.$invalid;
                return dirty === !0 ? invalid && ($scope.clicked_submit || field.$dirty) : invalid && $scope.clicked_submit
            }, $scope.emailRs = !1, $scope.emailConfirm = function() {
                $scope.emailRs = $scope.customer.email != $scope.customer.email2 ? !0 : !1
            }, $scope.$watch("customer.email", function(val) {
                $scope.match_email = val && !!val.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)
            }), $scope.$watch("customer.tel", function(val) {
                $scope.valid_customer_tel = val && !!val.match(/(^[+\uff10-\uff190-9-\u30fc\u2212]{1}[\uff10-\uff190-9-\u30fc\u2212]+$)/) && !val.match(/(^[-\u30fc\u2212]+$)/)
            }), $scope.$watch("other_shipping.tel", function(val) {
                $scope.valid_ship_tel = val && !!val.match(/(^[+\uff10-\uff190-9-\u30fc\u2212]{1}[\uff10-\uff190-9-\u30fc\u2212]+$)/) && !val.match(/(^[-\u30fc\u2212]+$)/)
            }), $scope.useCoupon = function(code) {
                $http.get("/store/" + USER_NAME + "/coupons/" + code).success(function(data) {
                    if (data.conditions) switch (data.conditions[0].type) {
                        case "amount":
                            if (data.conditions[0].value > $scope.cart.total - $scope.cart.shipping_fee) return function() {
                                delete $scope.coupon, delete $scope.$root.coupon, $scope.cart.sum()
                            }(), void($scope.errors = {
                                coupon: ["\u91d1\u984d\u304c\u8db3\u308a\u306a\u3044\u305f\u3081\u30af\u30fc\u30dd\u30f3\u3092\u9069\u7528\u3067\u304d\u307e\u305b\u3093"]
                            })
                    }
                    switch ($scope.$root.coupon = data, $scope.coupon.details[0].type) {
                        case "free_shipping":
                            $scope.coupon.price = $scope.cart.shipping_fee;
                            break;
                        case "discount":
                            $scope.cart.total <= $scope.coupon.details[0].value ? ($scope.errors = {
                                coupon: ["\u91d1\u984d\u304c\u8db3\u308a\u306a\u3044\u305f\u3081\u30af\u30fc\u30dd\u30f3\u3092\u9069\u7528\u3067\u304d\u307e\u305b\u3093"]
                            }, delete $scope.$root.coupon) : $scope.coupon.price = $scope.coupon.details[0].value;
                            break;
                        case "n_percent_discount":
                            $scope.coupon.price = Math.floor($scope.cart.sub_total * ($scope.coupon.details[0].value / 100))
                    }
                    $scope.cart.sum()
                }).error(function() {
                    $scope.errors = {
                        coupon: [I18n.store.checkout.couponCodeErr]
                    }
                })
            }, $scope.$root.useCoupon = $scope.useCoupon, angular.extend(this.$root, {
                customer: $scope.customer
            }), $scope.$watch("customer.prefecture", function() {
                $scope.coupon && $scope.useCoupon($scope.coupon.code)
            }), $scope.$watch("customer.cc.number", function() {
                $scope.customer.cc.company = creditCard.company_by_number($scope.customer.cc.number)
            });
            var formValid = function() {
                    if (!$scope.form.$valid) return !1;
                    var payment_method = $scope.customer.payment_method[0];
                    //if ("-" === payment_method) return !1;
                    if ($scope.enableGiftAddon && !$rootScope.shipToSameAddress) {
                        var isValidGiftForm = _.isEmpty(_.filter($rootScope.other_shipping, function(v) {
                            return _.isEmpty(v)
                        }));
                        //if (!isValidGiftForm) return !1
                    }
                    return $scope.emailRs === !0 || $scope.match_email === !1 ? !1 : $scope.valid_customer_tel === !1 || $scope.valid_ship_tel === !1 ? !1 : $scope.customer.receive_method && "-" === $scope.customer.receive_method.key ? !1 : !0
                },
                trackFormError = function() {
                    $scope.form.$valid === !1 ? _.each($scope.form.$error, function(error) {
                        _.each(error, function(e) {
                            _gaq.push(["_trackEvent", "checkout_form", "error", e.$name])
                        })
                    }) : _gaq.push(["_trackEvent", "checkout_form", "error", "credit_card"])
                };
            $scope.submit = function() {
                return $scope.clicked_submit = !0, _.each(["number", "security_code"], function(attr) {
                    _.isString($scope.customer.cc[attr]) && ($scope.customer.cc[attr] = $scope.customer.cc[attr].hankaku().replace(/\D/g, ""))
                }), formValid() ? ORDER_AMOUNT_LIMIT[$scope.customer.payment_method[0]] < $scope.cart.total ? void alert("\u6c7a\u6e08\u4e0a\u9650\u91d1\u984d\u3092\u8d85\u904e\u3057\u3066\u3044\u307e\u3059\u3002") : (angular.extend(this.$root, {
                    customer: $scope.customer,
                    misc: {
                        payment_methods: $scope.payment_methods
                    },
                    coupon: $scope.coupon
                }), void $location.path("/checkout_confirm")) : void trackFormError()
            }, $scope.back_to_market = function() {
                $window.location = $scope.market_back_url
            }
        },
        checkout_confirm: function() {
            return $rootScope.hide_logo = !0, $scope.$root.step = 2, $scope.$root.state = "", $scope.resize_order_done = function(url) {
                urls = url.split(".");
                var resized_image = null;
                //return resized_image = urls[0] + "_50x50." + urls[1]
                return resized_image = urls[0] + "." + urls[1]
            }, $scope.postToFeedOrder = function(order_item) {
                function callback(response) {
                    response && analytics.event("order_item", "share", "facebook")
                }
                FB.init({
                    appId: "106518812838112",
                    status: !0,
                    cookie: !0
                });
                var obj = {
                    method: "feed",
                    redirect_uri: "https://store.jp",
                    link: location.protocol + "//" + location.host + "/#!/items/" + order_item.item_id,
                    picture: $scope.origin_image_url + order_item.images[0].n,
                    name: decodeURIComponent(order_item.n),
                    caption: decodeURIComponent(order_item.n),
                    description: decodeURIComponent(order_item.n)
                };
                FB.ui(obj, callback)
            }, twttr.events.unbind("tweet"), twttr.events.bind("tweet", function() {
                analytics.event("order_item", "share", "twitter")
            }), $scope.I18n = I18n, $scope.store_name = USER_NAME, $scope.origin_url = location.protocol + "//" + location.host, $scope.origin_url_tw = encodeURIComponent($scope.origin_url + "/#!/items/"), $scope.origin_image_url = $scope.origin_url + "/files/" + USER_NAME + "/", $scope.enableGiftAddon = storesJpAddonUtility.isEnableAddon("gift_form"), $scope.cart.items.length ? _.isEmpty($scope.$root.customer) ? void $location.path("/checkout") : ($scope.customer = $scope.$root.customer, $scope.styles.logo && ($scope.logo_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + $scope.styles.logo), $scope.cart.sum(), $scope.cart.refresh_quantity(), $scope.submit = function() {
                var params = checkout.beforeSubmit(),
                    errorCallback = function(data) {
                        $scope.$root.state = "", "error_credit" == data.status ? (_gaq.push(["_trackEvent", "order", "error", "error_credit"]), $scope.$root.error_credit = !0, $location.path("/checkout")) : "error_bank_transfer" == data.status ? ($scope.$root.error_bank_transfer = !0, $scope.$root.state = "", $location.path("/checkout")) : "error_convenience_store_payment" == data.status ? (_gaq.push(["_trackEvent", "order", "error", "error_convenience_store_payment"]), $scope.$root.error_convenience_store_payment = !0, $location.path("/checkout")) : "error_asukanet_order" == data.status ? ($scope.$root.error_asukanet_order = !0, $scope.$root.error_asukanet_order_msg = data.msg, $location.path("/checkout")) : (_gaq.push(["_trackEvent", "order", "error", "other"]), $scope.cart.empty_cart(), delete $scope.$root.customer, delete $scope.$root.misc, alert($scope.I18n.store.error.checkout), $location.url("/"))
                    };
                checkout.submit(params, checkout.submitCallback, errorCallback)
            }, void($scope.cancel = function() {
                $location.url("/")
            })) : void $location.path("/")
        }
    })
}

function DownloadController($scope, $resource, $location, $routeParams, $http) {
    $scope.address_err = !1, $scope.I18n = I18n, $scope.confirm_address = "", urlstr = $location.$$absUrl.split("orders/result/"), order_id = urlstr.pop(), $scope.dl_order_id = order_id, $http.get("/orders/download_status/" + order_id).success(function() {
        $scope.download_ok = !0
    }).error(function() {
        $scope.download_ok = !1
    }), $scope.download_ok = !1, $scope.checkAndSendAddress = function(data, order_id) {
        $http.post("/orders/check_download_address/" + order_id, {
            authenticity_token: AUTH_TOKEN,
            address: data
        }).success(function() {
            $scope.download_ok = !0, $location.url("/")
        }).error(function() {
            $scope.address_err = !0, $scope.download_ok = !1
        })
    }
}

function OrdersController($scope, $resource, $location, $routeParams, $http, $rootElement, checkout) {
    angular.extend($scope, {
        checkout: function() {
            $scope.I18n = I18n, $scope.preset = {
                prefectures: I18n.prefectures,
                cc: {
                    companies: ["visa", "master", "amex"],
                    expires: {
                        years: function() {
                            var y = (new Date).getFullYear();
                            return _.range(y, y + 8)
                        }(),
                        months: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                }
            }, $scope.meta = {
                dontBack: !0
            }, $scope.cart.empty_cart(), $scope.cartTitle = "\u843d\u672d\u5546\u54c1", $scope.$root.customer || ($scope.customer = {
                cc: {
                    company: void 0,
                    number: void 0,
                    name: void 0,
                    security_code: void 0,
                    expires: {
                        year: $scope.preset.cc.expires.years[0],
                        month: $scope.preset.cc.expires.months[11]
                    }
                },
                prefecture: $scope.preset.prefectures[0]
            });
            var addCart = function(order) {
                for (var length = order.items.length, i = 0; length > i; ++i) {
                    var stocks = {};
                    stocks[order.items[i].ordered_variation] = order.items[i].ordered_quantity, $scope.cart.add(order.items[i], stocks)
                }
            };
            $http.get("/orders/provisional/" + ORDER_ID).success(function(data) {
                $scope.shipping_fee ? addCart(data) : $http.get("/store/" + USER_NAME + "/shipping_fee").success(function(shipping_fee) {
                    $scope.shipping_fee = shipping_fee, addCart(data)
                }), $scope.customer.email = data.email
            }).error(function() {}), $scope.$root.error && (delete $scope.$root.error, $scope.error = !0), $scope.$root.convenienceError && (delete $scope.$root.convenienceError, $scope.convenienceError = !0), $scope.$root.misc ? $scope.payment_methods = $scope.$root.misc.payment_methods : $http.get("/store/" + USER_NAME + "/payment_methods").success(function(data) {
                var key_num = 0;
                for (keys in data) key_num++, "credit" != keys && "bank_transfer" != keys && "cash_on_delivery" != keys && "convenience_store_payment" != keys && "-" != keys && delete data[keys];
                var credit_lang = "\u30af\u30ec\u30b8\u30c3\u30c8\u30ab\u30fc\u30c9",
                    non_select_lang = "\u9078\u629e\u3057\u3066\u304f\u3060\u3055\u3044";
                "en" == I18n.locale && (credit_lang = "Credit Card", non_select_lang = "Select Payment Method", delete data.bank_transfer, delete data.cash_on_delivery, delete data.convenience_store_payment, payment_method = "credit", key_num = 1);
                var convert_payment_method = function(payment_method) {
                    switch (payment_method) {
                        case "credit":
                            return credit_lang;
                        case "bank_transfer":
                            return "\u9280\u884c\u632f\u8fbc";
                        case "cash_on_delivery":
                            return "\u4ee3\u91d1\u5f15\u63db";
                        case "convenience_store_payment":
                            return "\u30b3\u30f3\u30d3\u30cb\u6c7a\u6e08";
                        case "mbok_payment":
                            return "\u5916\u90e8\u6c7a\u6e08";
                        case "-":
                            return non_select_lang
                    }
                };
                $scope.payment_methods = [], key_num > 1 && $scope.payment_methods.push(["-", non_select_lang, 0]), _.each(data, function(v, k) {
                    $scope.payment_methods.push([k, convert_payment_method(k), v]), $scope.customer.payment_method && "credit" === $scope.customer.payment_method[0] || ($scope.shipping_fee ? $scope.cart.sum() : $http.get("/store/" + USER_NAME + "/shipping_fee").success(function(data) {
                        $scope.shipping_fee = data, $scope.cart.sum()
                    }))
                }), $scope.customer.payment_method = $scope.payment_methods[0]
            }), $scope.emailRs = !1, $scope.emailConfirm = function() {
                $scope.emailRs = $scope.customer.email != $scope.customer.email2 ? !0 : !1
            }, $scope.submit = function() {
                if ($scope.clicked_submit = !0, _.each(["number", "security_code"], function(attr) {
                        _.isString($scope.customer.cc[attr]) && ($scope.customer.cc[attr] = $scope.customer.cc[attr].hankaku().replace(/\D/g, ""))
                    }), 1 != $scope.emailRs) {
                    var payment_method = $scope.customer.payment_method[0];
                    if ($scope.form.$valid && ("credit" !== payment_method || _.isEmpty(_.filter($scope.customer.cc, function(v) {
                            return _.isEmpty(v)
                        }))) && "-" !== payment_method) {
                        if (ORDER_AMOUNT_LIMIT[payment_method] < $scope.cart.total) return void alert("\u6c7a\u6e08\u4e0a\u9650\u91d1\u984d\u3092\u8d85\u904e\u3057\u3066\u3044\u307e\u3059\u3002");
                        angular.extend(this.$root, {
                            customer: $scope.customer,
                            misc: {
                                payment_methods: $scope.payment_methods
                            },
                            coupon: $scope.coupon
                        }), $location.path("/confirm")
                    }
                }
            }
        },
        checkout_confirm: function() {
            $scope.resize_order_done = function(url) {
                urls = url.split(".");
                var resized_image = null;
                //return resized_image = urls[0] + "_50x50." + urls[1]
                return resized_image = urls[0] + "." + urls[1]
            }, $scope.I18n = I18n, $scope.store_name = USER_NAME, $scope.origin_url = location.protocol + "//" + location.host, $scope.origin_url_tw = encodeURIComponent($scope.origin_url + "/#!/items/"), $scope.origin_image_url = $scope.origin_url + "/files/" + USER_NAME + "/", $scope.cart.items.length || $location.path("/"), _.isEmpty($scope.$root.customer) ? $location.path("/") : ($scope.customer = $scope.$root.customer, $scope.styles.logo && ($scope.logo_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + $scope.styles.logo), "credit" === $scope.customer.payment_method[0] && ($scope.temp = {
                cc_number: function(cc_number) {
                    var str = "";
                    cc_number = String(cc_number);
                    for (var i = cc_number.length - 5; i >= 0; i--) str += "X";
                    return str + cc_number.substr(-4)
                }($scope.customer.cc.number),
                security_code: function(security_code) {
                    for (var str = "", i = 0; i < security_code.toString().length; i++) str += "X";
                    return str
                }($scope.customer.cc.security_code),
                icon: "/images/icon/icon_card_" + $scope.customer.cc.company + ".gif"
            }), $scope.cartTitle = "\u843d\u672d\u5546\u54c1", $scope.cart.sum(), $scope.cart.refresh_quantity(), $scope.submit = function() {
                var params = checkout.beforeSubmit(),
                    errorCallback = function(data) {
                        "error_credit" == data.status ? ($scope.$root.error_credit = !0, $scope.$root.state = "", $location.path("/")) : "error_bank_transfer" == data.status ? ($scope.$root.error_bank_transfer = !0, $scope.$root.state = "", $location.path("/")) : "error_convenience_store_payment" == data.status ? ($scope.$root.error_convenience_store_payment = !0, $scope.$root.state = "", $location.path("/")) : ($scope.$root.state = "error", $scope.cart.empty_cart(), delete $scope.$root.customer, delete $scope.$root.misc)
                    };
                checkout.updateToPending(params, checkout.submitCallback, errorCallback)
            }, $scope.cancel = function() {
                $location.path("/")
            })
        }
    })
}

function NewsController($scope, $resource, $routeParams, $location, $http) {
    $scope.I18n = I18n,
        function() {
            $http.get("/news/check/" + USER_NAME).success(function(data) {
                $scope.news_navi = "true" === data ? !0 : !1
            })
        }(), angular.extend($scope, {
            news: function() {
                var page = $routeParams.page || 1;
                $scope.currentPage = 1, $scope.user_name = USER_NAME, $scope.pagenations = [1, 2, 3], updatePageTitle("NEWS"), $http.get("/news/store/" + USER_NAME + "?page=" + page).success(function(data) {
                    $scope.news_pager = data, _.each($scope.news_pager.news, function(news) {
                        var image_name = news.image_url.split(".");
                        news.image_url = image_name[0] + "_0x620." + image_name[1]
                    }), setTimeout(function() {
                        $(".news_body").autolink("_blank")
                    }, 0)
                }), $scope.prevPage = function() {
                    var route_page = $routeParams.page || 1,
                        page = Number(route_page) - 1;
                    $scope.setPage(page)
                }, $scope.nextPage = function() {
                    var route_page = $routeParams.page || 1,
                        page = Number(route_page) + 1;
                    $scope.setPage(page)
                }, $scope.setPage = function(page) {
                    location.href = location.href.match("page") ? location.href.replace(/\p\a\g\e\=[0-9].*/, "page=" + page) : location.href + "?page=" + page
                }
            },
            news_show: function() {
                $scope.user_name = USER_NAME, $http.get("/news/store_show/" + $routeParams.news_id).success(function(data) {
                    $scope.news = data;
                    var image_name = $scope.news.image_url.split(".");
                    $scope.news.image_url = image_name[0] + "_0x620." + image_name[1], setTimeout(function() {
                        $("#news_body").autolink("_blank")
                    }, 0)
                })
            }
        })
}

function R18Controller($scope, $http) {
    $http.get("/store/" + USER_NAME + "/r18_config").success(function(data) {
        data.r18_config && ($scope.r18_config = data.r18_config.t);
        var cookie = $.cookie("confirm");
        !cookie && $scope.r18_config && ($(".contents_view").hide(), mobile_flag ? $(".store_r18over").show() : $(".r18over").show())
    }), $("#close_r18").click(function() {
        $.cookie.json = !0, $.cookie("confirm", !0, {
            expires: 7,
            path: "/"
        }), $(".contents_view").show(), mobile_flag ? $(".store_r18over").hide() : $(".r18over").hide(), $("dd.name").tile()
    })
}

function StoresController($scope, $http, $location, $rootScope, optimizely, $timeout, Profile) {
    $rootScope.hide_logo = !1, $scope.via = "premium" === STORES_JP.plan ? "shop_premium" : "shop", $scope.stores_domain = STORES_JP.stores_domain;
    var is_optimizely_activate = !1;
    $scope.footer_mouse_over = function() {
        is_optimizely_activate !== !0 && (optimizely.activate(1589071962), is_optimizely_activate = !0)
    }, $scope.user_name = USER_NAME, $scope.I18n = I18n, angular.extend($scope, {
        inquiry: function() {
            var page_title = "Liên hệ";
            "en" == I18n.locale && (page_title = "Contact"), updatePageTitle(page_title), setCookiePromotion(location.href, STORES_JP.promotion_enabled), $scope.submit = function() {
                $scope.clicked_submit = !0, $scope.form.$valid && ($scope.pending = !0, $http.post("/store/" + USER_NAME + "/inquiries", {
                    authenticity_token: AUTH_TOKEN,
                    data: $scope.customer
                }).success(function() {
                    delete $scope.pending, $scope.accepted = !0
                }).error(function() {
                    delete $scope.pending
                }))
            }, $scope.category_click = function(param) {
                location.href = "#!/?category=" + encodeURIComponent(param)
            }
        },
        tokushoho: function() {
            var page_title = "Điều khoản & Điều kiện";
            "en" == I18n.locale && (page_title = "Notation based on the Specified Commercial Transaction Act"), updatePageTitle(page_title), $http.get("/stores/" + USER_NAME + "/tokushoho").success(function(data) {
                $scope.data = data
            }).error(function(data) {
                $scope.data = data
            }), $scope.category_click = function(param) {
                location.href = "#!/?category=" + encodeURIComponent(param)
            }
        },
        about: function() {
            var page_title = "en" === I18n.locale ? "About" : "\u30b9\u30c8\u30a2\u8aac\u660e";
            updatePageTitle(page_title), $http.get("/store/" + USER_NAME + "/about").success(function(data) {
                $scope.data = data, setTimeout(function() {
                    $("#store_about").autolink("_blank")
                }, 0)
            }), Profile.get({
                user_name: USER_NAME,
                image_width: "120",
                image_height: "120"
            }, function(profile) {
                $scope.profile = profile, $scope.profile.profile_image && $scope.profile.profile_image.name && ($scope.profile_image_src = $scope.profile.profile_image.src_url)
            }), $scope.category_click = function(param) {
                location.href = "#!/?category=" + encodeURIComponent(param)
            }
        },
        unsubscribes: function() {
            updatePageTitle(""), $scope.submit = function() {
                $scope.clicked_submit = !0, $scope.form.$valid && ($scope.pending = !0, $http.post("/store/" + USER_NAME + "/unsubscribes", {
                    authenticity_token: AUTH_TOKEN,
                    data: $scope.unsubscribe
                }).success(function() {
                    $scope.accepted = !0
                }).error(function() {
                    delete $scope.pending
                }))
            }, $scope.category_click = function(param) {
                location.href = "#!/?category=" + encodeURIComponent(param)
            }
        },
        customer: {}
    })
}
var I18n = I18n || {};
I18n.translations = {
        en: {
            js: <?php echo $language;?>
        },
        ja: {
            js: <?php echo $language;?>
        }
    },
    function(i, s, o, g, r, a, m) {
        i.GoogleAnalyticsObject = r, i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date, a = s.createElement(o), m = s.getElementsByTagName(o)[0], a.async = 1, a.src = g, m.parentNode.insertBefore(a, m)
    }(window, document, "script", "//www.google-analytics.com/analytics.js", "ga"),
    function(e, t) {
        function _(e) {
            var t = M[e] = {};
            return v.each(e.split(y), function(e, n) {
                t[n] = !0
            }), t
        }

        function H(e, n, r) {
            if (r === t && 1 === e.nodeType) {
                var i = "data-" + n.replace(P, "-$1").toLowerCase();
                if (r = e.getAttribute(i), "string" == typeof r) {
                    try {
                        r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : D.test(r) ? v.parseJSON(r) : r
                    } catch (s) {}
                    v.data(e, n, r)
                } else r = t
            }
            return r
        }

        function B(e) {
            var t;
            for (t in e)
                if (("data" !== t || !v.isEmptyObject(e[t])) && "toJSON" !== t) return !1;
            return !0
        }

        function et() {
            return !1
        }

        function tt() {
            return !0
        }

        function ut(e) {
            return !e || !e.parentNode || 11 === e.parentNode.nodeType
        }

        function at(e, t) {
            do e = e[t]; while (e && 1 !== e.nodeType);
            return e
        }

        function ft(e, t, n) {
            if (t = t || 0, v.isFunction(t)) return v.grep(e, function(e, r) {
                var i = !!t.call(e, r, e);
                return i === n
            });
            if (t.nodeType) return v.grep(e, function(e) {
                return e === t === n
            });
            if ("string" == typeof t) {
                var r = v.grep(e, function(e) {
                    return 1 === e.nodeType
                });
                if (it.test(t)) return v.filter(t, r, !n);
                t = v.filter(t, r)
            }
            return v.grep(e, function(e) {
                return v.inArray(e, t) >= 0 === n
            })
        }

        function lt(e) {
            var t = ct.split("|"),
                n = e.createDocumentFragment();
            if (n.createElement)
                for (; t.length;) n.createElement(t.pop());
            return n
        }

        function Lt(e, t) {
            return e.getElementsByTagName(t)[0] || e.appendChild(e.ownerDocument.createElement(t))
        }

        function At(e, t) {
            if (1 === t.nodeType && v.hasData(e)) {
                var n, r, i, s = v._data(e),
                    o = v._data(t, s),
                    u = s.events;
                if (u) {
                    delete o.handle, o.events = {};
                    for (n in u)
                        for (r = 0, i = u[n].length; i > r; r++) v.event.add(t, n, u[n][r])
                }
                o.data && (o.data = v.extend({}, o.data))
            }
        }

        function Ot(e, t) {
            var n;
            1 === t.nodeType && (t.clearAttributes && t.clearAttributes(), t.mergeAttributes && t.mergeAttributes(e), n = t.nodeName.toLowerCase(), "object" === n ? (t.parentNode && (t.outerHTML = e.outerHTML), v.support.html5Clone && e.innerHTML && !v.trim(t.innerHTML) && (t.innerHTML = e.innerHTML)) : "input" === n && Et.test(e.type) ? (t.defaultChecked = t.checked = e.checked, t.value !== e.value && (t.value = e.value)) : "option" === n ? t.selected = e.defaultSelected : "input" === n || "textarea" === n ? t.defaultValue = e.defaultValue : "script" === n && t.text !== e.text && (t.text = e.text), t.removeAttribute(v.expando))
        }

        function Mt(e) {
            return "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName("*") : "undefined" != typeof e.querySelectorAll ? e.querySelectorAll("*") : []
        }

        function _t(e) {
            Et.test(e.type) && (e.defaultChecked = e.checked)
        }

        function Qt(e, t) {
            if (t in e) return t;
            for (var n = t.charAt(0).toUpperCase() + t.slice(1), r = t, i = Jt.length; i--;)
                if (t = Jt[i] + n, t in e) return t;
            return r
        }

        function Gt(e, t) {
            return e = t || e, "none" === v.css(e, "display") || !v.contains(e.ownerDocument, e)
        }

        function Yt(e, t) {
            for (var n, r, i = [], s = 0, o = e.length; o > s; s++) n = e[s], n.style && (i[s] = v._data(n, "olddisplay"), t ? (!i[s] && "none" === n.style.display && (n.style.display = ""), "" === n.style.display && Gt(n) && (i[s] = v._data(n, "olddisplay", nn(n.nodeName)))) : (r = Dt(n, "display"), !i[s] && "none" !== r && v._data(n, "olddisplay", r)));
            for (s = 0; o > s; s++) n = e[s], n.style && (t && "none" !== n.style.display && "" !== n.style.display || (n.style.display = t ? i[s] || "" : "none"));
            return e
        }

        function Zt(e, t, n) {
            var r = Rt.exec(t);
            return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
        }

        function en(e, t, n, r) {
            for (var i = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0, s = 0; 4 > i; i += 2) "margin" === n && (s += v.css(e, n + $t[i], !0)), r ? ("content" === n && (s -= parseFloat(Dt(e, "padding" + $t[i])) || 0), "margin" !== n && (s -= parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0)) : (s += parseFloat(Dt(e, "padding" + $t[i])) || 0, "padding" !== n && (s += parseFloat(Dt(e, "border" + $t[i] + "Width")) || 0));
            return s
        }

        function tn(e, t, n) {
            var r = "width" === t ? e.offsetWidth : e.offsetHeight,
                i = !0,
                s = v.support.boxSizing && "border-box" === v.css(e, "boxSizing");
            if (0 >= r || null == r) {
                if (r = Dt(e, t), (0 > r || null == r) && (r = e.style[t]), Ut.test(r)) return r;
                i = s && (v.support.boxSizingReliable || r === e.style[t]), r = parseFloat(r) || 0
            }
            return r + en(e, t, n || (s ? "border" : "content"), i) + "px"
        }

        function nn(e) {
            if (Wt[e]) return Wt[e];
            var t = v("<" + e + ">").appendTo(i.body),
                n = t.css("display");
            return t.remove(), ("none" === n || "" === n) && (Pt = i.body.appendChild(Pt || v.extend(i.createElement("iframe"), {
                frameBorder: 0,
                width: 0,
                height: 0
            })), Ht && Pt.createElement || (Ht = (Pt.contentWindow || Pt.contentDocument).document, Ht.write("<!doctype html><html><body>"), Ht.close()), t = Ht.body.appendChild(Ht.createElement(e)), n = Dt(t, "display"), i.body.removeChild(Pt)), Wt[e] = n, n
        }

        function fn(e, t, n, r) {
            var i;
            if (v.isArray(t)) v.each(t, function(t, i) {
                n || sn.test(e) ? r(e, i) : fn(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r)
            });
            else if (n || "object" !== v.type(t)) r(e, t);
            else
                for (i in t) fn(e + "[" + i + "]", t[i], n, r)
        }

        function Cn(e) {
            return function(t, n) {
                "string" != typeof t && (n = t, t = "*");
                var r, i, s, o = t.toLowerCase().split(y),
                    u = 0,
                    a = o.length;
                if (v.isFunction(n))
                    for (; a > u; u++) r = o[u], s = /^\+/.test(r), s && (r = r.substr(1) || "*"), i = e[r] = e[r] || [], i[s ? "unshift" : "push"](n)
            }
        }

        function kn(e, n, r, i, s, o) {
            s = s || n.dataTypes[0], o = o || {}, o[s] = !0;
            for (var u, a = e[s], f = 0, l = a ? a.length : 0, c = e === Sn; l > f && (c || !u); f++) u = a[f](n, r, i), "string" == typeof u && (!c || o[u] ? u = t : (n.dataTypes.unshift(u), u = kn(e, n, r, i, u, o)));
            return (c || !u) && !o["*"] && (u = kn(e, n, r, i, "*", o)), u
        }

        function Ln(e, n) {
            var r, i, s = v.ajaxSettings.flatOptions || {};
            for (r in n) n[r] !== t && ((s[r] ? e : i || (i = {}))[r] = n[r]);
            i && v.extend(!0, e, i)
        }

        function An(e, n, r) {
            var i, s, o, u, a = e.contents,
                f = e.dataTypes,
                l = e.responseFields;
            for (s in l) s in r && (n[l[s]] = r[s]);
            for (;
                "*" === f[0];) f.shift(), i === t && (i = e.mimeType || n.getResponseHeader("content-type"));
            if (i)
                for (s in a)
                    if (a[s] && a[s].test(i)) {
                        f.unshift(s);
                        break
                    }
            if (f[0] in r) o = f[0];
            else {
                for (s in r) {
                    if (!f[0] || e.converters[s + " " + f[0]]) {
                        o = s;
                        break
                    }
                    u || (u = s)
                }
                o = o || u
            }
            return o ? (o !== f[0] && f.unshift(o), r[o]) : void 0
        }

        function On(e, t) {
            var n, r, i, s, o = e.dataTypes.slice(),
                u = o[0],
                a = {},
                f = 0;
            if (e.dataFilter && (t = e.dataFilter(t, e.dataType)), o[1])
                for (n in e.converters) a[n.toLowerCase()] = e.converters[n];
            for (; i = o[++f];)
                if ("*" !== i) {
                    if ("*" !== u && u !== i) {
                        if (n = a[u + " " + i] || a["* " + i], !n)
                            for (r in a)
                                if (s = r.split(" "), s[1] === i && (n = a[u + " " + s[0]] || a["* " + s[0]])) {
                                    n === !0 ? n = a[r] : a[r] !== !0 && (i = s[0], o.splice(f--, 0, i));
                                    break
                                }
                        if (n !== !0)
                            if (n && e["throws"]) t = n(t);
                            else try {
                                t = n(t)
                            } catch (l) {
                                return {
                                    state: "parsererror",
                                    error: n ? l : "No conversion from " + u + " to " + i
                                }
                            }
                    }
                    u = i
                }
            return {
                state: "success",
                data: t
            }
        }

        function Fn() {
            try {
                return new e.XMLHttpRequest
            } catch (t) {}
        }

        function In() {
            try {
                return new e.ActiveXObject("Microsoft.XMLHTTP")
            } catch (t) {}
        }

        function $n() {
            return setTimeout(function() {
                qn = t
            }, 0), qn = v.now()
        }

        function Jn(e, t) {
            v.each(t, function(t, n) {
                for (var r = (Vn[t] || []).concat(Vn["*"]), i = 0, s = r.length; s > i; i++)
                    if (r[i].call(e, t, n)) return
            })
        }

        function Kn(e, t, n) {
            var r, i = 0,
                o = Xn.length,
                u = v.Deferred().always(function() {
                    delete a.elem
                }),
                a = function() {
                    for (var t = qn || $n(), n = Math.max(0, f.startTime + f.duration - t), r = n / f.duration || 0, i = 1 - r, s = 0, o = f.tweens.length; o > s; s++) f.tweens[s].run(i);
                    return u.notifyWith(e, [f, i, n]), 1 > i && o ? n : (u.resolveWith(e, [f]), !1)
                },
                f = u.promise({
                    elem: e,
                    props: v.extend({}, t),
                    opts: v.extend(!0, {
                        specialEasing: {}
                    }, n),
                    originalProperties: t,
                    originalOptions: n,
                    startTime: qn || $n(),
                    duration: n.duration,
                    tweens: [],
                    createTween: function(t, n) {
                        var i = v.Tween(e, f.opts, t, n, f.opts.specialEasing[t] || f.opts.easing);
                        return f.tweens.push(i), i
                    },
                    stop: function(t) {
                        for (var n = 0, r = t ? f.tweens.length : 0; r > n; n++) f.tweens[n].run(1);
                        return t ? u.resolveWith(e, [f, t]) : u.rejectWith(e, [f, t]), this
                    }
                }),
                l = f.props;
            for (Qn(l, f.opts.specialEasing); o > i; i++)
                if (r = Xn[i].call(f, e, l, f.opts)) return r;
            return Jn(f, l), v.isFunction(f.opts.start) && f.opts.start.call(e, f), v.fx.timer(v.extend(a, {
                anim: f,
                queue: f.opts.queue,
                elem: e
            })), f.progress(f.opts.progress).done(f.opts.done, f.opts.complete).fail(f.opts.fail).always(f.opts.always)
        }

        function Qn(e, t) {
            var n, r, i, s, o;
            for (n in e)
                if (r = v.camelCase(n), i = t[r], s = e[n], v.isArray(s) && (i = s[1], s = e[n] = s[0]), n !== r && (e[r] = s, delete e[n]), o = v.cssHooks[r], o && "expand" in o) {
                    s = o.expand(s), delete e[r];
                    for (n in s) n in e || (e[n] = s[n], t[n] = i)
                } else t[r] = i
        }

        function Gn(e, t, n) {
            var r, i, s, o, u, a, f, l, c, h = this,
                p = e.style,
                d = {},
                m = [],
                g = e.nodeType && Gt(e);
            n.queue || (l = v._queueHooks(e, "fx"), null == l.unqueued && (l.unqueued = 0, c = l.empty.fire, l.empty.fire = function() {
                l.unqueued || c()
            }), l.unqueued++, h.always(function() {
                h.always(function() {
                    l.unqueued--, v.queue(e, "fx").length || l.empty.fire()
                })
            })), 1 === e.nodeType && ("height" in t || "width" in t) && (n.overflow = [p.overflow, p.overflowX, p.overflowY], "inline" === v.css(e, "display") && "none" === v.css(e, "float") && (v.support.inlineBlockNeedsLayout && "inline" !== nn(e.nodeName) ? p.zoom = 1 : p.display = "inline-block")), n.overflow && (p.overflow = "hidden", v.support.shrinkWrapBlocks || h.done(function() {
                p.overflow = n.overflow[0], p.overflowX = n.overflow[1], p.overflowY = n.overflow[2]
            }));
            for (r in t)
                if (s = t[r], Un.exec(s)) {
                    if (delete t[r], a = a || "toggle" === s, s === (g ? "hide" : "show")) continue;
                    m.push(r)
                }
            if (o = m.length) {
                u = v._data(e, "fxshow") || v._data(e, "fxshow", {}), "hidden" in u && (g = u.hidden), a && (u.hidden = !g), g ? v(e).show() : h.done(function() {
                    v(e).hide()
                }), h.done(function() {
                    var t;
                    v.removeData(e, "fxshow", !0);
                    for (t in d) v.style(e, t, d[t])
                });
                for (r = 0; o > r; r++) i = m[r], f = h.createTween(i, g ? u[i] : 0), d[i] = u[i] || v.style(e, i), i in u || (u[i] = f.start, g && (f.end = f.start, f.start = "width" === i || "height" === i ? 1 : 0))
            }
        }

        function Yn(e, t, n, r, i) {
            return new Yn.prototype.init(e, t, n, r, i)
        }

        function Zn(e, t) {
            var n, r = {
                    height: e
                },
                i = 0;
            for (t = t ? 1 : 0; 4 > i; i += 2 - t) n = $t[i], r["margin" + n] = r["padding" + n] = e;
            return t && (r.opacity = r.width = e), r
        }

        function tr(e) {
            return v.isWindow(e) ? e : 9 === e.nodeType ? e.defaultView || e.parentWindow : !1
        }
        var n, r, i = e.document,
            s = e.location,
            o = e.navigator,
            u = e.jQuery,
            a = e.$,
            f = Array.prototype.push,
            l = Array.prototype.slice,
            c = Array.prototype.indexOf,
            h = Object.prototype.toString,
            p = Object.prototype.hasOwnProperty,
            d = String.prototype.trim,
            v = function(e, t) {
                return new v.fn.init(e, t, n)
            },
            m = /[\-+]?(?:\d*\.|)\d+(?:[eE][\-+]?\d+|)/.source,
            g = /\S/,
            y = /\s+/,
            b = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
            w = /^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,
            E = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
            S = /^[\],:{}\s]*$/,
            x = /(?:^|:|,)(?:\s*\[)+/g,
            T = /\\(?:["\\\/bfnrt]|u[\da-fA-F]{4})/g,
            N = /"[^"\\\r\n]*"|true|false|null|-?(?:\d\d*\.|)\d+(?:[eE][\-+]?\d+|)/g,
            C = /^-ms-/,
            k = /-([\da-z])/gi,
            L = function(e, t) {
                return (t + "").toUpperCase()
            },
            A = function() {
                i.addEventListener ? (i.removeEventListener("DOMContentLoaded", A, !1), v.ready()) : "complete" === i.readyState && (i.detachEvent("onreadystatechange", A), v.ready())
            },
            O = {};
        v.fn = v.prototype = {
            constructor: v,
            init: function(e, n, r) {
                var s, o, a;
                if (!e) return this;
                if (e.nodeType) return this.context = this[0] = e, this.length = 1, this;
                if ("string" == typeof e) {
                    if (s = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : w.exec(e), s && (s[1] || !n)) {
                        if (s[1]) return n = n instanceof v ? n[0] : n, a = n && n.nodeType ? n.ownerDocument || n : i, e = v.parseHTML(s[1], a, !0), E.test(s[1]) && v.isPlainObject(n) && this.attr.call(e, n, !0), v.merge(this, e);
                        if (o = i.getElementById(s[2]), o && o.parentNode) {
                            if (o.id !== s[2]) return r.find(e);
                            this.length = 1, this[0] = o
                        }
                        return this.context = i, this.selector = e, this
                    }
                    return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e)
                }
                return v.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), v.makeArray(e, this))
            },
            selector: "",
            jquery: "1.8.3",
            length: 0,
            size: function() {
                return this.length
            },
            toArray: function() {
                return l.call(this)
            },
            get: function(e) {
                return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e]
            },
            pushStack: function(e, t, n) {
                var r = v.merge(this.constructor(), e);
                return r.prevObject = this, r.context = this.context, "find" === t ? r.selector = this.selector + (this.selector ? " " : "") + n : t && (r.selector = this.selector + "." + t + "(" + n + ")"), r
            },
            each: function(e, t) {
                return v.each(this, e, t)
            },
            ready: function(e) {
                return v.ready.promise().done(e), this
            },
            eq: function(e) {
                return e = +e, -1 === e ? this.slice(e) : this.slice(e, e + 1)
            },
            first: function() {
                return this.eq(0)
            },
            last: function() {
                return this.eq(-1)
            },
            slice: function() {
                return this.pushStack(l.apply(this, arguments), "slice", l.call(arguments).join(","))
            },
            map: function(e) {
                return this.pushStack(v.map(this, function(t, n) {
                    return e.call(t, n, t)
                }))
            },
            end: function() {
                return this.prevObject || this.constructor(null)
            },
            push: f,
            sort: [].sort,
            splice: [].splice
        }, v.fn.init.prototype = v.fn, v.extend = v.fn.extend = function() {
            var e, n, r, i, s, o, u = arguments[0] || {},
                a = 1,
                f = arguments.length,
                l = !1;
            for ("boolean" == typeof u && (l = u, u = arguments[1] || {}, a = 2), "object" != typeof u && !v.isFunction(u) && (u = {}), f === a && (u = this, --a); f > a; a++)
                if (null != (e = arguments[a]))
                    for (n in e) r = u[n], i = e[n], u !== i && (l && i && (v.isPlainObject(i) || (s = v.isArray(i))) ? (s ? (s = !1, o = r && v.isArray(r) ? r : []) : o = r && v.isPlainObject(r) ? r : {}, u[n] = v.extend(l, o, i)) : i !== t && (u[n] = i));
            return u
        }, v.extend({
            noConflict: function(t) {
                return e.$ === v && (e.$ = a), t && e.jQuery === v && (e.jQuery = u), v
            },
            isReady: !1,
            readyWait: 1,
            holdReady: function(e) {
                e ? v.readyWait++ : v.ready(!0)
            },
            ready: function(e) {
                if (e === !0 ? !--v.readyWait : !v.isReady) {
                    if (!i.body) return setTimeout(v.ready, 1);
                    v.isReady = !0, e !== !0 && --v.readyWait > 0 || (r.resolveWith(i, [v]), v.fn.trigger && v(i).trigger("ready").off("ready"))
                }
            },
            isFunction: function(e) {
                return "function" === v.type(e)
            },
            isArray: Array.isArray || function(e) {
                return "array" === v.type(e)
            },
            isWindow: function(e) {
                return null != e && e == e.window
            },
            isNumeric: function(e) {
                return !isNaN(parseFloat(e)) && isFinite(e)
            },
            type: function(e) {
                return null == e ? String(e) : O[h.call(e)] || "object"
            },
            isPlainObject: function(e) {
                if (!e || "object" !== v.type(e) || e.nodeType || v.isWindow(e)) return !1;
                try {
                    if (e.constructor && !p.call(e, "constructor") && !p.call(e.constructor.prototype, "isPrototypeOf")) return !1
                } catch (n) {
                    return !1
                }
                var r;
                for (r in e);
                return r === t || p.call(e, r)
            },
            isEmptyObject: function(e) {
                var t;
                for (t in e) return !1;
                return !0
            },
            error: function(e) {
                throw new Error(e)
            },
            parseHTML: function(e, t, n) {
                var r;
                return e && "string" == typeof e ? ("boolean" == typeof t && (n = t, t = 0), t = t || i, (r = E.exec(e)) ? [t.createElement(r[1])] : (r = v.buildFragment([e], t, n ? null : []), v.merge([], (r.cacheable ? v.clone(r.fragment) : r.fragment).childNodes))) : null
            },
            parseJSON: function(t) {
                return t && "string" == typeof t ? (t = v.trim(t), e.JSON && e.JSON.parse ? e.JSON.parse(t) : S.test(t.replace(T, "@").replace(N, "]").replace(x, "")) ? new Function("return " + t)() : void v.error("Invalid JSON: " + t)) : null
            },
            parseXML: function(n) {
                var r, i;
                if (!n || "string" != typeof n) return null;
                try {
                    e.DOMParser ? (i = new DOMParser, r = i.parseFromString(n, "text/xml")) : (r = new ActiveXObject("Microsoft.XMLDOM"), r.async = "false", r.loadXML(n))
                } catch (s) {
                    r = t
                }
                return (!r || !r.documentElement || r.getElementsByTagName("parsererror").length) && v.error("Invalid XML: " + n), r
            },
            noop: function() {},
            globalEval: function(t) {
                t && g.test(t) && (e.execScript || function(t) {
                    e.eval.call(e, t)
                })(t)
            },
            camelCase: function(e) {
                return e.replace(C, "ms-").replace(k, L)
            },
            nodeName: function(e, t) {
                return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
            },
            each: function(e, n, r) {
                var i, s = 0,
                    o = e.length,
                    u = o === t || v.isFunction(e);
                if (r)
                    if (u) {
                        for (i in e)
                            if (n.apply(e[i], r) === !1) break
                    } else
                        for (; o > s && n.apply(e[s++], r) !== !1;);
                else if (u) {
                    for (i in e)
                        if (n.call(e[i], i, e[i]) === !1) break
                } else
                    for (; o > s && n.call(e[s], s, e[s++]) !== !1;);
                return e
            },
            trim: d && !d.call("\ufeff\xa0") ? function(e) {
                return null == e ? "" : d.call(e)
            } : function(e) {
                return null == e ? "" : (e + "").replace(b, "")
            },
            makeArray: function(e, t) {
                var n, r = t || [];
                return null != e && (n = v.type(e), null == e.length || "string" === n || "function" === n || "regexp" === n || v.isWindow(e) ? f.call(r, e) : v.merge(r, e)), r
            },
            inArray: function(e, t, n) {
                var r;
                if (t) {
                    if (c) return c.call(t, e, n);
                    for (r = t.length, n = n ? 0 > n ? Math.max(0, r + n) : n : 0; r > n; n++)
                        if (n in t && t[n] === e) return n
                }
                return -1
            },
            merge: function(e, n) {
                var r = n.length,
                    i = e.length,
                    s = 0;
                if ("number" == typeof r)
                    for (; r > s; s++) e[i++] = n[s];
                else
                    for (; n[s] !== t;) e[i++] = n[s++];
                return e.length = i, e
            },
            grep: function(e, t, n) {
                var r, i = [],
                    s = 0,
                    o = e.length;
                for (n = !!n; o > s; s++) r = !!t(e[s], s), n !== r && i.push(e[s]);
                return i
            },
            map: function(e, n, r) {
                var i, s, o = [],
                    u = 0,
                    a = e.length,
                    f = e instanceof v || a !== t && "number" == typeof a && (a > 0 && e[0] && e[a - 1] || 0 === a || v.isArray(e));
                if (f)
                    for (; a > u; u++) i = n(e[u], u, r), null != i && (o[o.length] = i);
                else
                    for (s in e) i = n(e[s], s, r), null != i && (o[o.length] = i);
                return o.concat.apply([], o)
            },
            guid: 1,
            proxy: function(e, n) {
                var r, i, s;
                return "string" == typeof n && (r = e[n], n = e, e = r), v.isFunction(e) ? (i = l.call(arguments, 2), s = function() {
                    return e.apply(n, i.concat(l.call(arguments)))
                }, s.guid = e.guid = e.guid || v.guid++, s) : t
            },
            access: function(e, n, r, i, s, o, u) {
                var a, f = null == r,
                    l = 0,
                    c = e.length;
                if (r && "object" == typeof r) {
                    for (l in r) v.access(e, n, l, r[l], 1, o, i);
                    s = 1
                } else if (i !== t) {
                    if (a = u === t && v.isFunction(i), f && (a ? (a = n, n = function(e, t, n) {
                            return a.call(v(e), n)
                        }) : (n.call(e, i), n = null)), n)
                        for (; c > l; l++) n(e[l], r, a ? i.call(e[l], l, n(e[l], r)) : i, u);
                    s = 1
                }
                return s ? e : f ? n.call(e) : c ? n(e[0], r) : o
            },
            now: function() {
                return (new Date).getTime()
            }
        }), v.ready.promise = function(t) {
            if (!r)
                if (r = v.Deferred(), "complete" === i.readyState) setTimeout(v.ready, 1);
                else if (i.addEventListener) i.addEventListener("DOMContentLoaded", A, !1), e.addEventListener("load", v.ready, !1);
            else {
                i.attachEvent("onreadystatechange", A), e.attachEvent("onload", v.ready);
                var n = !1;
                try {
                    n = null == e.frameElement && i.documentElement
                } catch (s) {}
                n && n.doScroll && function o() {
                    if (!v.isReady) {
                        try {
                            n.doScroll("left")
                        } catch (e) {
                            return setTimeout(o, 50)
                        }
                        v.ready()
                    }
                }()
            }
            return r.promise(t)
        }, v.each("Boolean Number String Function Array Date RegExp Object".split(" "), function(e, t) {
            O["[object " + t + "]"] = t.toLowerCase()
        }), n = v(i);
        var M = {};
        v.Callbacks = function(e) {
            e = "string" == typeof e ? M[e] || _(e) : v.extend({}, e);
            var n, r, i, s, o, u, a = [],
                f = !e.once && [],
                l = function(t) {
                    for (n = e.memory && t, r = !0, u = s || 0, s = 0, o = a.length, i = !0; a && o > u; u++)
                        if (a[u].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
                            n = !1;
                            break
                        }
                    i = !1, a && (f ? f.length && l(f.shift()) : n ? a = [] : c.disable())
                },
                c = {
                    add: function() {
                        if (a) {
                            var t = a.length;
                            ! function r(t) {
                                v.each(t, function(t, n) {
                                    var i = v.type(n);
                                    "function" === i ? (!e.unique || !c.has(n)) && a.push(n) : n && n.length && "string" !== i && r(n)
                                })
                            }(arguments), i ? o = a.length : n && (s = t, l(n))
                        }
                        return this
                    },
                    remove: function() {
                        return a && v.each(arguments, function(e, t) {
                            for (var n;
                                (n = v.inArray(t, a, n)) > -1;) a.splice(n, 1), i && (o >= n && o--, u >= n && u--)
                        }), this
                    },
                    has: function(e) {
                        return v.inArray(e, a) > -1
                    },
                    empty: function() {
                        return a = [], this
                    },
                    disable: function() {
                        return a = f = n = t, this
                    },
                    disabled: function() {
                        return !a
                    },
                    lock: function() {
                        return f = t, n || c.disable(), this
                    },
                    locked: function() {
                        return !f
                    },
                    fireWith: function(e, t) {
                        return t = t || [], t = [e, t.slice ? t.slice() : t], a && (!r || f) && (i ? f.push(t) : l(t)), this
                    },
                    fire: function() {
                        return c.fireWith(this, arguments), this
                    },
                    fired: function() {
                        return !!r
                    }
                };
            return c
        }, v.extend({
            Deferred: function(e) {
                var t = [
                        ["resolve", "done", v.Callbacks("once memory"), "resolved"],
                        ["reject", "fail", v.Callbacks("once memory"), "rejected"],
                        ["notify", "progress", v.Callbacks("memory")]
                    ],
                    n = "pending",
                    r = {
                        state: function() {
                            return n
                        },
                        always: function() {
                            return i.done(arguments).fail(arguments), this
                        },
                        then: function() {
                            var e = arguments;
                            return v.Deferred(function(n) {
                                v.each(t, function(t, r) {
                                    var s = r[0],
                                        o = e[t];
                                    i[r[1]](v.isFunction(o) ? function() {
                                        var e = o.apply(this, arguments);
                                        e && v.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[s + "With"](this === i ? n : this, [e])
                                    } : n[s])
                                }), e = null
                            }).promise()
                        },
                        promise: function(e) {
                            return null != e ? v.extend(e, r) : r
                        }
                    },
                    i = {};
                return r.pipe = r.then, v.each(t, function(e, s) {
                    var o = s[2],
                        u = s[3];
                    r[s[1]] = o.add, u && o.add(function() {
                        n = u
                    }, t[1 ^ e][2].disable, t[2][2].lock), i[s[0]] = o.fire, i[s[0] + "With"] = o.fireWith
                }), r.promise(i), e && e.call(i, i), i
            },
            when: function(e) {
                var u, a, f, t = 0,
                    n = l.call(arguments),
                    r = n.length,
                    i = 1 !== r || e && v.isFunction(e.promise) ? r : 0,
                    s = 1 === i ? e : v.Deferred(),
                    o = function(e, t, n) {
                        return function(r) {
                            t[e] = this, n[e] = arguments.length > 1 ? l.call(arguments) : r, n === u ? s.notifyWith(t, n) : --i || s.resolveWith(t, n)
                        }
                    };
                if (r > 1)
                    for (u = new Array(r), a = new Array(r), f = new Array(r); r > t; t++) n[t] && v.isFunction(n[t].promise) ? n[t].promise().done(o(t, f, n)).fail(s.reject).progress(o(t, a, u)) : --i;
                return i || s.resolveWith(f, n), s.promise()
            }
        }), v.support = function() {
            var t, n, r, s, o, u, a, f, l, c, h, p = i.createElement("div");
            if (p.setAttribute("className", "t"), p.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>", n = p.getElementsByTagName("*"), r = p.getElementsByTagName("a")[0], !n || !r || !n.length) return {};
            s = i.createElement("select"), o = s.appendChild(i.createElement("option")), u = p.getElementsByTagName("input")[0], r.style.cssText = "top:1px;float:left;opacity:.5", t = {
                leadingWhitespace: 3 === p.firstChild.nodeType,
                tbody: !p.getElementsByTagName("tbody").length,
                htmlSerialize: !!p.getElementsByTagName("link").length,
                style: /top/.test(r.getAttribute("style")),
                hrefNormalized: "/a" === r.getAttribute("href"),
                opacity: /^0.5/.test(r.style.opacity),
                cssFloat: !!r.style.cssFloat,
                checkOn: "on" === u.value,
                optSelected: o.selected,
                getSetAttribute: "t" !== p.className,
                enctype: !!i.createElement("form").enctype,
                html5Clone: "<:nav></:nav>" !== i.createElement("nav").cloneNode(!0).outerHTML,
                boxModel: "CSS1Compat" === i.compatMode,
                submitBubbles: !0,
                changeBubbles: !0,
                focusinBubbles: !1,
                deleteExpando: !0,
                noCloneEvent: !0,
                inlineBlockNeedsLayout: !1,
                shrinkWrapBlocks: !1,
                reliableMarginRight: !0,
                boxSizingReliable: !0,
                pixelPosition: !1
            }, u.checked = !0, t.noCloneChecked = u.cloneNode(!0).checked, s.disabled = !0, t.optDisabled = !o.disabled;
            try {
                delete p.test
            } catch (d) {
                t.deleteExpando = !1
            }
            if (!p.addEventListener && p.attachEvent && p.fireEvent && (p.attachEvent("onclick", h = function() {
                    t.noCloneEvent = !1
                }), p.cloneNode(!0).fireEvent("onclick"), p.detachEvent("onclick", h)), u = i.createElement("input"), u.value = "t", u.setAttribute("type", "radio"), t.radioValue = "t" === u.value, u.setAttribute("checked", "checked"), u.setAttribute("name", "t"), p.appendChild(u), a = i.createDocumentFragment(), a.appendChild(p.lastChild), t.checkClone = a.cloneNode(!0).cloneNode(!0).lastChild.checked, t.appendChecked = u.checked, a.removeChild(u), a.appendChild(p), p.attachEvent)
                for (l in {
                        submit: !0,
                        change: !0,
                        focusin: !0
                    }) f = "on" + l, c = f in p, c || (p.setAttribute(f, "return;"), c = "function" == typeof p[f]), t[l + "Bubbles"] = c;
            return v(function() {
                var n, r, s, o, u = "padding:0;margin:0;border:0;display:block;overflow:hidden;",
                    a = i.getElementsByTagName("body")[0];
                a && (n = i.createElement("div"), n.style.cssText = "visibility:hidden;border:0;width:0;height:0;position:static;top:0;margin-top:1px", a.insertBefore(n, a.firstChild), r = i.createElement("div"), n.appendChild(r), r.innerHTML = "<table><tr><td></td><td>t</td></tr></table>", s = r.getElementsByTagName("td"), s[0].style.cssText = "padding:0;margin:0;border:0;display:none", c = 0 === s[0].offsetHeight, s[0].style.display = "", s[1].style.display = "none", t.reliableHiddenOffsets = c && 0 === s[0].offsetHeight, r.innerHTML = "", r.style.cssText = "box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%;", t.boxSizing = 4 === r.offsetWidth, t.doesNotIncludeMarginInBodyOffset = 1 !== a.offsetTop, e.getComputedStyle && (t.pixelPosition = "1%" !== (e.getComputedStyle(r, null) || {}).top, t.boxSizingReliable = "4px" === (e.getComputedStyle(r, null) || {
                    width: "4px"
                }).width, o = i.createElement("div"), o.style.cssText = r.style.cssText = u, o.style.marginRight = o.style.width = "0", r.style.width = "1px", r.appendChild(o), t.reliableMarginRight = !parseFloat((e.getComputedStyle(o, null) || {}).marginRight)), "undefined" != typeof r.style.zoom && (r.innerHTML = "", r.style.cssText = u + "width:1px;padding:1px;display:inline;zoom:1", t.inlineBlockNeedsLayout = 3 === r.offsetWidth, r.style.display = "block", r.style.overflow = "visible", r.innerHTML = "<div></div>", r.firstChild.style.width = "5px", t.shrinkWrapBlocks = 3 !== r.offsetWidth, n.style.zoom = 1), a.removeChild(n), n = r = s = o = null)
            }), a.removeChild(p), n = r = s = o = u = a = p = null, t
        }();
        var D = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
            P = /([A-Z])/g;
        v.extend({
            cache: {},
            deletedIds: [],
            uuid: 0,
            expando: "jQuery" + (v.fn.jquery + Math.random()).replace(/\D/g, ""),
            noData: {
                embed: !0,
                object: "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
                applet: !0
            },
            hasData: function(e) {
                return e = e.nodeType ? v.cache[e[v.expando]] : e[v.expando], !!e && !B(e)
            },
            data: function(e, n, r, i) {
                if (v.acceptData(e)) {
                    var s, o, u = v.expando,
                        a = "string" == typeof n,
                        f = e.nodeType,
                        l = f ? v.cache : e,
                        c = f ? e[u] : e[u] && u;
                    if (c && l[c] && (i || l[c].data) || !a || r !== t) return c || (f ? e[u] = c = v.deletedIds.pop() || v.guid++ : c = u), l[c] || (l[c] = {}, f || (l[c].toJSON = v.noop)), ("object" == typeof n || "function" == typeof n) && (i ? l[c] = v.extend(l[c], n) : l[c].data = v.extend(l[c].data, n)), s = l[c], i || (s.data || (s.data = {}), s = s.data), r !== t && (s[v.camelCase(n)] = r), a ? (o = s[n], null == o && (o = s[v.camelCase(n)])) : o = s, o
                }
            },
            removeData: function(e, t, n) {
                if (v.acceptData(e)) {
                    var r, i, s, o = e.nodeType,
                        u = o ? v.cache : e,
                        a = o ? e[v.expando] : v.expando;
                    if (u[a]) {
                        if (t && (r = n ? u[a] : u[a].data)) {
                            v.isArray(t) || (t in r ? t = [t] : (t = v.camelCase(t), t = t in r ? [t] : t.split(" ")));
                            for (i = 0, s = t.length; s > i; i++) delete r[t[i]];
                            if (!(n ? B : v.isEmptyObject)(r)) return
                        }(n || (delete u[a].data, B(u[a]))) && (o ? v.cleanData([e], !0) : v.support.deleteExpando || u != u.window ? delete u[a] : u[a] = null)
                    }
                }
            },
            _data: function(e, t, n) {
                return v.data(e, t, n, !0)
            },
            acceptData: function(e) {
                var t = e.nodeName && v.noData[e.nodeName.toLowerCase()];
                return !t || t !== !0 && e.getAttribute("classid") === t
            }
        }), v.fn.extend({
            data: function(e, n) {
                var r, i, s, o, u, a = this[0],
                    f = 0,
                    l = null;
                if (e === t) {
                    if (this.length && (l = v.data(a), 1 === a.nodeType && !v._data(a, "parsedAttrs"))) {
                        for (s = a.attributes, u = s.length; u > f; f++) o = s[f].name, o.indexOf("data-") || (o = v.camelCase(o.substring(5)), H(a, o, l[o]));
                        v._data(a, "parsedAttrs", !0)
                    }
                    return l
                }
                return "object" == typeof e ? this.each(function() {
                    v.data(this, e)
                }) : (r = e.split(".", 2), r[1] = r[1] ? "." + r[1] : "", i = r[1] + "!", v.access(this, function(n) {
                    return n === t ? (l = this.triggerHandler("getData" + i, [r[0]]), l === t && a && (l = v.data(a, e), l = H(a, e, l)), l === t && r[1] ? this.data(r[0]) : l) : (r[1] = n, void this.each(function() {
                        var t = v(this);
                        t.triggerHandler("setData" + i, r), v.data(this, e, n), t.triggerHandler("changeData" + i, r)
                    }))
                }, null, n, arguments.length > 1, null, !1))
            },
            removeData: function(e) {
                return this.each(function() {
                    v.removeData(this, e)
                })
            }
        }), v.extend({
            queue: function(e, t, n) {
                var r;
                return e ? (t = (t || "fx") + "queue", r = v._data(e, t), n && (!r || v.isArray(n) ? r = v._data(e, t, v.makeArray(n)) : r.push(n)), r || []) : void 0
            },
            dequeue: function(e, t) {
                t = t || "fx";
                var n = v.queue(e, t),
                    r = n.length,
                    i = n.shift(),
                    s = v._queueHooks(e, t),
                    o = function() {
                        v.dequeue(e, t)
                    };
                "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete s.stop, i.call(e, o, s)), !r && s && s.empty.fire()
            },
            _queueHooks: function(e, t) {
                var n = t + "queueHooks";
                return v._data(e, n) || v._data(e, n, {
                    empty: v.Callbacks("once memory").add(function() {
                        v.removeData(e, t + "queue", !0), v.removeData(e, n, !0)
                    })
                })
            }
        }), v.fn.extend({
            queue: function(e, n) {
                var r = 2;
                return "string" != typeof e && (n = e, e = "fx", r--), arguments.length < r ? v.queue(this[0], e) : n === t ? this : this.each(function() {
                    var t = v.queue(this, e, n);
                    v._queueHooks(this, e), "fx" === e && "inprogress" !== t[0] && v.dequeue(this, e)
                })
            },
            dequeue: function(e) {
                return this.each(function() {
                    v.dequeue(this, e)
                })
            },
            delay: function(e, t) {
                return e = v.fx ? v.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
                    var r = setTimeout(t, e);
                    n.stop = function() {
                        clearTimeout(r)
                    }
                })
            },
            clearQueue: function(e) {
                return this.queue(e || "fx", [])
            },
            promise: function(e, n) {
                var r, i = 1,
                    s = v.Deferred(),
                    o = this,
                    u = this.length,
                    a = function() {
                        --i || s.resolveWith(o, [o])
                    };
                for ("string" != typeof e && (n = e, e = t), e = e || "fx"; u--;) r = v._data(o[u], e + "queueHooks"), r && r.empty && (i++, r.empty.add(a));
                return a(), s.promise(n)
            }
        });
        var j, F, I, q = /[\t\r\n]/g,
            R = /\r/g,
            U = /^(?:button|input)$/i,
            z = /^(?:button|input|object|select|textarea)$/i,
            W = /^a(?:rea|)$/i,
            X = /^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,
            V = v.support.getSetAttribute;
        v.fn.extend({
            attr: function(e, t) {
                return v.access(this, v.attr, e, t, arguments.length > 1)
            },
            removeAttr: function(e) {
                return this.each(function() {
                    v.removeAttr(this, e)
                })
            },
            prop: function(e, t) {
                return v.access(this, v.prop, e, t, arguments.length > 1)
            },
            removeProp: function(e) {
                return e = v.propFix[e] || e, this.each(function() {
                    try {
                        this[e] = t, delete this[e]
                    } catch (n) {}
                })
            },
            addClass: function(e) {
                var t, n, r, i, s, o, u;
                if (v.isFunction(e)) return this.each(function(t) {
                    v(this).addClass(e.call(this, t, this.className))
                });
                if (e && "string" == typeof e)
                    for (t = e.split(y), n = 0, r = this.length; r > n; n++)
                        if (i = this[n], 1 === i.nodeType)
                            if (i.className || 1 !== t.length) {
                                for (s = " " + i.className + " ", o = 0, u = t.length; u > o; o++) s.indexOf(" " + t[o] + " ") < 0 && (s += t[o] + " ");
                                i.className = v.trim(s)
                            } else i.className = e;
                return this
            },
            removeClass: function(e) {
                var n, r, i, s, o, u, a;
                if (v.isFunction(e)) return this.each(function(t) {
                    v(this).removeClass(e.call(this, t, this.className))
                });
                if (e && "string" == typeof e || e === t)
                    for (n = (e || "").split(y), u = 0, a = this.length; a > u; u++)
                        if (i = this[u], 1 === i.nodeType && i.className) {
                            for (r = (" " + i.className + " ").replace(q, " "), s = 0, o = n.length; o > s; s++)
                                for (; r.indexOf(" " + n[s] + " ") >= 0;) r = r.replace(" " + n[s] + " ", " ");
                            i.className = e ? v.trim(r) : ""
                        }
                return this
            },
            toggleClass: function(e, t) {
                var n = typeof e,
                    r = "boolean" == typeof t;
                return this.each(v.isFunction(e) ? function(n) {
                    v(this).toggleClass(e.call(this, n, this.className, t), t)
                } : function() {
                    if ("string" === n)
                        for (var i, s = 0, o = v(this), u = t, a = e.split(y); i = a[s++];) u = r ? u : !o.hasClass(i), o[u ? "addClass" : "removeClass"](i);
                    else("undefined" === n || "boolean" === n) && (this.className && v._data(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : v._data(this, "__className__") || "")
                })
            },
            hasClass: function(e) {
                for (var t = " " + e + " ", n = 0, r = this.length; r > n; n++)
                    if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(q, " ").indexOf(t) >= 0) return !0;
                return !1
            },
            val: function(e) {
                var n, r, i, s = this[0]; {
                    if (arguments.length) return i = v.isFunction(e), this.each(function(r) {
                        var s, o = v(this);
                        1 === this.nodeType && (s = i ? e.call(this, r, o.val()) : e, null == s ? s = "" : "number" == typeof s ? s += "" : v.isArray(s) && (s = v.map(s, function(e) {
                            return null == e ? "" : e + ""
                        })), n = v.valHooks[this.type] || v.valHooks[this.nodeName.toLowerCase()], n && "set" in n && n.set(this, s, "value") !== t || (this.value = s))
                    });
                    if (s) return n = v.valHooks[s.type] || v.valHooks[s.nodeName.toLowerCase()], n && "get" in n && (r = n.get(s, "value")) !== t ? r : (r = s.value, "string" == typeof r ? r.replace(R, "") : null == r ? "" : r)
                }
            }
        }), v.extend({
            valHooks: {
                option: {
                    get: function(e) {
                        var t = e.attributes.value;
                        return !t || t.specified ? e.value : e.text
                    }
                },
                select: {
                    get: function(e) {
                        for (var t, n, r = e.options, i = e.selectedIndex, s = "select-one" === e.type || 0 > i, o = s ? null : [], u = s ? i + 1 : r.length, a = 0 > i ? u : s ? i : 0; u > a; a++)
                            if (n = r[a], !(!n.selected && a !== i || (v.support.optDisabled ? n.disabled : null !== n.getAttribute("disabled")) || n.parentNode.disabled && v.nodeName(n.parentNode, "optgroup"))) {
                                if (t = v(n).val(), s) return t;
                                o.push(t)
                            }
                        return o
                    },
                    set: function(e, t) {
                        var n = v.makeArray(t);
                        return v(e).find("option").each(function() {
                            this.selected = v.inArray(v(this).val(), n) >= 0
                        }), n.length || (e.selectedIndex = -1), n
                    }
                }
            },
            attrFn: {},
            attr: function(e, n, r, i) {
                var s, o, u, a = e.nodeType;
                if (e && 3 !== a && 8 !== a && 2 !== a) return i && v.isFunction(v.fn[n]) ? v(e)[n](r) : "undefined" == typeof e.getAttribute ? v.prop(e, n, r) : (u = 1 !== a || !v.isXMLDoc(e), u && (n = n.toLowerCase(), o = v.attrHooks[n] || (X.test(n) ? F : j)), r !== t ? null === r ? void v.removeAttr(e, n) : o && "set" in o && u && (s = o.set(e, r, n)) !== t ? s : (e.setAttribute(n, r + ""), r) : o && "get" in o && u && null !== (s = o.get(e, n)) ? s : (s = e.getAttribute(n), null === s ? t : s))
            },
            removeAttr: function(e, t) {
                var n, r, i, s, o = 0;
                if (t && 1 === e.nodeType)
                    for (r = t.split(y); o < r.length; o++) i = r[o], i && (n = v.propFix[i] || i, s = X.test(i), s || v.attr(e, i, ""), e.removeAttribute(V ? i : n), s && n in e && (e[n] = !1))
            },
            attrHooks: {
                type: {
                    set: function(e, t) {
                        if (U.test(e.nodeName) && e.parentNode) v.error("type property can't be changed");
                        else if (!v.support.radioValue && "radio" === t && v.nodeName(e, "input")) {
                            var n = e.value;
                            return e.setAttribute("type", t), n && (e.value = n), t
                        }
                    }
                },
                value: {
                    get: function(e, t) {
                        return j && v.nodeName(e, "button") ? j.get(e, t) : t in e ? e.value : null
                    },
                    set: function(e, t, n) {
                        return j && v.nodeName(e, "button") ? j.set(e, t, n) : void(e.value = t)
                    }
                }
            },
            propFix: {
                tabindex: "tabIndex",
                readonly: "readOnly",
                "for": "htmlFor",
                "class": "className",
                maxlength: "maxLength",
                cellspacing: "cellSpacing",
                cellpadding: "cellPadding",
                rowspan: "rowSpan",
                colspan: "colSpan",
                usemap: "useMap",
                frameborder: "frameBorder",
                contenteditable: "contentEditable"
            },
            prop: function(e, n, r) {
                var i, s, o, u = e.nodeType;
                if (e && 3 !== u && 8 !== u && 2 !== u) return o = 1 !== u || !v.isXMLDoc(e), o && (n = v.propFix[n] || n, s = v.propHooks[n]), r !== t ? s && "set" in s && (i = s.set(e, r, n)) !== t ? i : e[n] = r : s && "get" in s && null !== (i = s.get(e, n)) ? i : e[n]
            },
            propHooks: {
                tabIndex: {
                    get: function(e) {
                        var n = e.getAttributeNode("tabindex");
                        return n && n.specified ? parseInt(n.value, 10) : z.test(e.nodeName) || W.test(e.nodeName) && e.href ? 0 : t
                    }
                }
            }
        }), F = {
            get: function(e, n) {
                var r, i = v.prop(e, n);
                return i === !0 || "boolean" != typeof i && (r = e.getAttributeNode(n)) && r.nodeValue !== !1 ? n.toLowerCase() : t
            },
            set: function(e, t, n) {
                var r;
                return t === !1 ? v.removeAttr(e, n) : (r = v.propFix[n] || n, r in e && (e[r] = !0), e.setAttribute(n, n.toLowerCase())), n
            }
        }, V || (I = {
            name: !0,
            id: !0,
            coords: !0
        }, j = v.valHooks.button = {
            get: function(e, n) {
                var r;
                return r = e.getAttributeNode(n), r && (I[n] ? "" !== r.value : r.specified) ? r.value : t
            },
            set: function(e, t, n) {
                var r = e.getAttributeNode(n);
                return r || (r = i.createAttribute(n), e.setAttributeNode(r)), r.value = t + ""
            }
        }, v.each(["width", "height"], function(e, t) {
            v.attrHooks[t] = v.extend(v.attrHooks[t], {
                set: function(e, n) {
                    return "" === n ? (e.setAttribute(t, "auto"), n) : void 0
                }
            })
        }), v.attrHooks.contenteditable = {
            get: j.get,
            set: function(e, t, n) {
                "" === t && (t = "false"), j.set(e, t, n)
            }
        }), v.support.hrefNormalized || v.each(["href", "src", "width", "height"], function(e, n) {
            v.attrHooks[n] = v.extend(v.attrHooks[n], {
                get: function(e) {
                    var r = e.getAttribute(n, 2);
                    return null === r ? t : r
                }
            })
        }), v.support.style || (v.attrHooks.style = {
            get: function(e) {
                return e.style.cssText.toLowerCase() || t
            },
            set: function(e, t) {
                return e.style.cssText = t + ""
            }
        }), v.support.optSelected || (v.propHooks.selected = v.extend(v.propHooks.selected, {
            get: function(e) {
                var t = e.parentNode;
                return t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex), null
            }
        })), v.support.enctype || (v.propFix.enctype = "encoding"), v.support.checkOn || v.each(["radio", "checkbox"], function() {
            v.valHooks[this] = {
                get: function(e) {
                    return null === e.getAttribute("value") ? "on" : e.value
                }
            }
        }), v.each(["radio", "checkbox"], function() {
            v.valHooks[this] = v.extend(v.valHooks[this], {
                set: function(e, t) {
                    return v.isArray(t) ? e.checked = v.inArray(v(e).val(), t) >= 0 : void 0
                }
            })
        });
        var $ = /^(?:textarea|input|select)$/i,
            J = /^([^\.]*|)(?:\.(.+)|)$/,
            K = /(?:^|\s)hover(\.\S+|)\b/,
            Q = /^key/,
            G = /^(?:mouse|contextmenu)|click/,
            Y = /^(?:focusinfocus|focusoutblur)$/,
            Z = function(e) {
                return v.event.special.hover ? e : e.replace(K, "mouseenter$1 mouseleave$1")
            };
        v.event = {
                add: function(e, n, r, i, s) {
                    var o, u, a, f, l, c, h, p, d, m, g;
                    if (3 !== e.nodeType && 8 !== e.nodeType && n && r && (o = v._data(e))) {
                        for (r.handler && (d = r, r = d.handler, s = d.selector), r.guid || (r.guid = v.guid++), a = o.events, a || (o.events = a = {}), u = o.handle, u || (o.handle = u = function(e) {
                                return "undefined" == typeof v || e && v.event.triggered === e.type ? t : v.event.dispatch.apply(u.elem, arguments)
                            }, u.elem = e), n = v.trim(Z(n)).split(" "), f = 0; f < n.length; f++) l = J.exec(n[f]) || [], c = l[1], h = (l[2] || "").split(".").sort(), g = v.event.special[c] || {}, c = (s ? g.delegateType : g.bindType) || c, g = v.event.special[c] || {}, p = v.extend({
                            type: c,
                            origType: l[1],
                            data: i,
                            handler: r,
                            guid: r.guid,
                            selector: s,
                            needsContext: s && v.expr.match.needsContext.test(s),
                            namespace: h.join(".")
                        }, d), m = a[c], m || (m = a[c] = [], m.delegateCount = 0, g.setup && g.setup.call(e, i, h, u) !== !1 || (e.addEventListener ? e.addEventListener(c, u, !1) : e.attachEvent && e.attachEvent("on" + c, u))), g.add && (g.add.call(e, p), p.handler.guid || (p.handler.guid = r.guid)), s ? m.splice(m.delegateCount++, 0, p) : m.push(p), v.event.global[c] = !0;
                        e = null
                    }
                },
                global: {},
                remove: function(e, t, n, r, i) {
                    var s, o, u, a, f, l, c, h, p, d, m, g = v.hasData(e) && v._data(e);
                    if (g && (h = g.events)) {
                        for (t = v.trim(Z(t || "")).split(" "), s = 0; s < t.length; s++)
                            if (o = J.exec(t[s]) || [], u = a = o[1], f = o[2], u) {
                                for (p = v.event.special[u] || {}, u = (r ? p.delegateType : p.bindType) || u, d = h[u] || [], l = d.length, f = f ? new RegExp("(^|\\.)" + f.split(".").sort().join("\\.(?:.*\\.|)") + "(\\.|$)") : null, c = 0; c < d.length; c++) m = d[c], !(!i && a !== m.origType || n && n.guid !== m.guid || f && !f.test(m.namespace) || r && r !== m.selector && ("**" !== r || !m.selector) || (d.splice(c--, 1), m.selector && d.delegateCount--, !p.remove || !p.remove.call(e, m)));
                                0 === d.length && l !== d.length && ((!p.teardown || p.teardown.call(e, f, g.handle) === !1) && v.removeEvent(e, u, g.handle), delete h[u])
                            } else
                                for (u in h) v.event.remove(e, u + t[s], n, r, !0);
                        v.isEmptyObject(h) && (delete g.handle, v.removeData(e, "events", !0))
                    }
                },
                customEvent: {
                    getData: !0,
                    setData: !0,
                    changeData: !0
                },
                trigger: function(n, r, s, o) {
                    if (!s || 3 !== s.nodeType && 8 !== s.nodeType) {
                        var u, a, f, l, c, h, p, d, m, g, y = n.type || n,
                            b = [];
                        if (Y.test(y + v.event.triggered)) return;
                        if (y.indexOf("!") >= 0 && (y = y.slice(0, -1), a = !0), y.indexOf(".") >= 0 && (b = y.split("."), y = b.shift(), b.sort()), (!s || v.event.customEvent[y]) && !v.event.global[y]) return;
                        if (n = "object" == typeof n ? n[v.expando] ? n : new v.Event(y, n) : new v.Event(y), n.type = y, n.isTrigger = !0, n.exclusive = a, n.namespace = b.join("."), n.namespace_re = n.namespace ? new RegExp("(^|\\.)" + b.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, h = y.indexOf(":") < 0 ? "on" + y : "", !s) {
                            u = v.cache;
                            for (f in u) u[f].events && u[f].events[y] && v.event.trigger(n, r, u[f].handle.elem, !0);
                            return
                        }
                        if (n.result = t, n.target || (n.target = s), r = null != r ? v.makeArray(r) : [], r.unshift(n), p = v.event.special[y] || {}, p.trigger && p.trigger.apply(s, r) === !1) return;
                        if (m = [
                                [s, p.bindType || y]
                            ], !o && !p.noBubble && !v.isWindow(s)) {
                            for (g = p.delegateType || y, l = Y.test(g + y) ? s : s.parentNode, c = s; l; l = l.parentNode) m.push([l, g]), c = l;
                            c === (s.ownerDocument || i) && m.push([c.defaultView || c.parentWindow || e, g])
                        }
                        for (f = 0; f < m.length && !n.isPropagationStopped(); f++) l = m[f][0], n.type = m[f][1], d = (v._data(l, "events") || {})[n.type] && v._data(l, "handle"), d && d.apply(l, r), d = h && l[h], d && v.acceptData(l) && d.apply && d.apply(l, r) === !1 && n.preventDefault();
                        return n.type = y, !(o || n.isDefaultPrevented() || p._default && p._default.apply(s.ownerDocument, r) !== !1 || "click" === y && v.nodeName(s, "a") || !v.acceptData(s) || !h || !s[y] || ("focus" === y || "blur" === y) && 0 === n.target.offsetWidth || v.isWindow(s) || (c = s[h], c && (s[h] = null), v.event.triggered = y, s[y](), v.event.triggered = t, !c || !(s[h] = c))), n.result
                    }
                },
                dispatch: function(n) {
                    n = v.event.fix(n || e.event);
                    var r, i, s, o, u, a, f, c, h, d = (v._data(this, "events") || {})[n.type] || [],
                        m = d.delegateCount,
                        g = l.call(arguments),
                        y = !n.exclusive && !n.namespace,
                        b = v.event.special[n.type] || {},
                        w = [];
                    if (g[0] = n, n.delegateTarget = this, !b.preDispatch || b.preDispatch.call(this, n) !== !1) {
                        if (m && (!n.button || "click" !== n.type))
                            for (s = n.target; s != this; s = s.parentNode || this)
                                if (s.disabled !== !0 || "click" !== n.type) {
                                    for (u = {}, f = [], r = 0; m > r; r++) c = d[r], h = c.selector, u[h] === t && (u[h] = c.needsContext ? v(h, this).index(s) >= 0 : v.find(h, this, null, [s]).length), u[h] && f.push(c);
                                    f.length && w.push({
                                        elem: s,
                                        matches: f
                                    })
                                }
                        for (d.length > m && w.push({
                                elem: this,
                                matches: d.slice(m)
                            }), r = 0; r < w.length && !n.isPropagationStopped(); r++)
                            for (a = w[r], n.currentTarget = a.elem, i = 0; i < a.matches.length && !n.isImmediatePropagationStopped(); i++) c = a.matches[i], (y || !n.namespace && !c.namespace || n.namespace_re && n.namespace_re.test(c.namespace)) && (n.data = c.data, n.handleObj = c, o = ((v.event.special[c.origType] || {}).handle || c.handler).apply(a.elem, g), o !== t && (n.result = o, o === !1 && (n.preventDefault(), n.stopPropagation())));
                        return b.postDispatch && b.postDispatch.call(this, n), n.result
                    }
                },
                props: "attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
                fixHooks: {},
                keyHooks: {
                    props: "char charCode key keyCode".split(" "),
                    filter: function(e, t) {
                        return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
                    }
                },
                mouseHooks: {
                    props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                    filter: function(e, n) {
                        var r, s, o, u = n.button,
                            a = n.fromElement;
                        return null == e.pageX && null != n.clientX && (r = e.target.ownerDocument || i, s = r.documentElement, o = r.body, e.pageX = n.clientX + (s && s.scrollLeft || o && o.scrollLeft || 0) - (s && s.clientLeft || o && o.clientLeft || 0), e.pageY = n.clientY + (s && s.scrollTop || o && o.scrollTop || 0) - (s && s.clientTop || o && o.clientTop || 0)), !e.relatedTarget && a && (e.relatedTarget = a === e.target ? n.toElement : a), !e.which && u !== t && (e.which = 1 & u ? 1 : 2 & u ? 3 : 4 & u ? 2 : 0), e
                    }
                },
                fix: function(e) {
                    if (e[v.expando]) return e;
                    var t, n, r = e,
                        s = v.event.fixHooks[e.type] || {},
                        o = s.props ? this.props.concat(s.props) : this.props;
                    for (e = v.Event(r), t = o.length; t;) n = o[--t], e[n] = r[n];
                    return e.target || (e.target = r.srcElement || i), 3 === e.target.nodeType && (e.target = e.target.parentNode), e.metaKey = !!e.metaKey, s.filter ? s.filter(e, r) : e
                },
                special: {
                    load: {
                        noBubble: !0
                    },
                    focus: {
                        delegateType: "focusin"
                    },
                    blur: {
                        delegateType: "focusout"
                    },
                    beforeunload: {
                        setup: function(e, t, n) {
                            v.isWindow(this) && (this.onbeforeunload = n)
                        },
                        teardown: function(e, t) {
                            this.onbeforeunload === t && (this.onbeforeunload = null)
                        }
                    }
                },
                simulate: function(e, t, n, r) {
                    var i = v.extend(new v.Event, n, {
                        type: e,
                        isSimulated: !0,
                        originalEvent: {}
                    });
                    r ? v.event.trigger(i, null, t) : v.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
                }
            }, v.event.handle = v.event.dispatch, v.removeEvent = i.removeEventListener ? function(e, t, n) {
                e.removeEventListener && e.removeEventListener(t, n, !1)
            } : function(e, t, n) {
                var r = "on" + t;
                e.detachEvent && ("undefined" == typeof e[r] && (e[r] = null), e.detachEvent(r, n))
            }, v.Event = function(e, t) {
                return this instanceof v.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.returnValue === !1 || e.getPreventDefault && e.getPreventDefault() ? tt : et) : this.type = e, t && v.extend(this, t), this.timeStamp = e && e.timeStamp || v.now(), this[v.expando] = !0, void 0) : new v.Event(e, t)
            }, v.Event.prototype = {
                preventDefault: function() {
                    this.isDefaultPrevented = tt;
                    var e = this.originalEvent;
                    e && (e.preventDefault ? e.preventDefault() : e.returnValue = !1)
                },
                stopPropagation: function() {
                    this.isPropagationStopped = tt;
                    var e = this.originalEvent;
                    e && (e.stopPropagation && e.stopPropagation(), e.cancelBubble = !0)
                },
                stopImmediatePropagation: function() {
                    this.isImmediatePropagationStopped = tt, this.stopPropagation()
                },
                isDefaultPrevented: et,
                isPropagationStopped: et,
                isImmediatePropagationStopped: et
            }, v.each({
                mouseenter: "mouseover",
                mouseleave: "mouseout"
            }, function(e, t) {
                v.event.special[e] = {
                    delegateType: t,
                    bindType: t,
                    handle: function(e) {
                        {
                            var n, r = this,
                                i = e.relatedTarget,
                                s = e.handleObj;
                            s.selector
                        }
                        return (!i || i !== r && !v.contains(r, i)) && (e.type = s.origType, n = s.handler.apply(this, arguments), e.type = t), n
                    }
                }
            }), v.support.submitBubbles || (v.event.special.submit = {
                setup: function() {
                    return v.nodeName(this, "form") ? !1 : void v.event.add(this, "click._submit keypress._submit", function(e) {
                        var n = e.target,
                            r = v.nodeName(n, "input") || v.nodeName(n, "button") ? n.form : t;
                        r && !v._data(r, "_submit_attached") && (v.event.add(r, "submit._submit", function(e) {
                            e._submit_bubble = !0
                        }), v._data(r, "_submit_attached", !0))
                    })
                },
                postDispatch: function(e) {
                    e._submit_bubble && (delete e._submit_bubble, this.parentNode && !e.isTrigger && v.event.simulate("submit", this.parentNode, e, !0))
                },
                teardown: function() {
                    return v.nodeName(this, "form") ? !1 : void v.event.remove(this, "._submit")
                }
            }), v.support.changeBubbles || (v.event.special.change = {
                setup: function() {
                    return $.test(this.nodeName) ? (("checkbox" === this.type || "radio" === this.type) && (v.event.add(this, "propertychange._change", function(e) {
                        "checked" === e.originalEvent.propertyName && (this._just_changed = !0)
                    }), v.event.add(this, "click._change", function(e) {
                        this._just_changed && !e.isTrigger && (this._just_changed = !1), v.event.simulate("change", this, e, !0)
                    })), !1) : void v.event.add(this, "beforeactivate._change", function(e) {
                        var t = e.target;
                        $.test(t.nodeName) && !v._data(t, "_change_attached") && (v.event.add(t, "change._change", function(e) {
                            this.parentNode && !e.isSimulated && !e.isTrigger && v.event.simulate("change", this.parentNode, e, !0)
                        }), v._data(t, "_change_attached", !0))
                    })
                },
                handle: function(e) {
                    var t = e.target;
                    return this !== t || e.isSimulated || e.isTrigger || "radio" !== t.type && "checkbox" !== t.type ? e.handleObj.handler.apply(this, arguments) : void 0
                },
                teardown: function() {
                    return v.event.remove(this, "._change"), !$.test(this.nodeName)
                }
            }), v.support.focusinBubbles || v.each({
                focus: "focusin",
                blur: "focusout"
            }, function(e, t) {
                var n = 0,
                    r = function(e) {
                        v.event.simulate(t, e.target, v.event.fix(e), !0)
                    };
                v.event.special[t] = {
                    setup: function() {
                        0 === n++ && i.addEventListener(e, r, !0)
                    },
                    teardown: function() {
                        0 === --n && i.removeEventListener(e, r, !0)
                    }
                }
            }), v.fn.extend({
                on: function(e, n, r, i, s) {
                    var o, u;
                    if ("object" == typeof e) {
                        "string" != typeof n && (r = r || n, n = t);
                        for (u in e) this.on(u, n, r, e[u], s);
                        return this
                    }
                    if (null == r && null == i ? (i = n, r = n = t) : null == i && ("string" == typeof n ? (i = r, r = t) : (i = r, r = n, n = t)), i === !1) i = et;
                    else if (!i) return this;
                    return 1 === s && (o = i, i = function(e) {
                        return v().off(e), o.apply(this, arguments)
                    }, i.guid = o.guid || (o.guid = v.guid++)), this.each(function() {
                        v.event.add(this, e, i, r, n)
                    })
                },
                one: function(e, t, n, r) {
                    return this.on(e, t, n, r, 1)
                },
                off: function(e, n, r) {
                    var i, s;
                    if (e && e.preventDefault && e.handleObj) return i = e.handleObj, v(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                    if ("object" == typeof e) {
                        for (s in e) this.off(s, n, e[s]);
                        return this
                    }
                    return (n === !1 || "function" == typeof n) && (r = n, n = t), r === !1 && (r = et), this.each(function() {
                        v.event.remove(this, e, r, n)
                    })
                },
                bind: function(e, t, n) {
                    return this.on(e, null, t, n)
                },
                unbind: function(e, t) {
                    return this.off(e, null, t)
                },
                live: function(e, t, n) {
                    return v(this.context).on(e, this.selector, t, n), this
                },
                die: function(e, t) {
                    return v(this.context).off(e, this.selector || "**", t), this
                },
                delegate: function(e, t, n, r) {
                    return this.on(t, e, n, r)
                },
                undelegate: function(e, t, n) {
                    return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
                },
                trigger: function(e, t) {
                    return this.each(function() {
                        v.event.trigger(e, t, this)
                    })
                },
                triggerHandler: function(e, t) {
                    return this[0] ? v.event.trigger(e, t, this[0], !0) : void 0
                },
                toggle: function(e) {
                    var t = arguments,
                        n = e.guid || v.guid++,
                        r = 0,
                        i = function(n) {
                            var i = (v._data(this, "lastToggle" + e.guid) || 0) % r;
                            return v._data(this, "lastToggle" + e.guid, i + 1), n.preventDefault(), t[i].apply(this, arguments) || !1
                        };
                    for (i.guid = n; r < t.length;) t[r++].guid = n;
                    return this.click(i)
                },
                hover: function(e, t) {
                    return this.mouseenter(e).mouseleave(t || e)
                }
            }), v.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
                v.fn[t] = function(e, n) {
                    return null == n && (n = e, e = null), arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
                }, Q.test(t) && (v.event.fixHooks[t] = v.event.keyHooks), G.test(t) && (v.event.fixHooks[t] = v.event.mouseHooks)
            }),
            function(e, t) {
                function nt(e, t, n, r) {
                    n = n || [], t = t || g;
                    var i, s, a, f, l = t.nodeType;
                    if (!e || "string" != typeof e) return n;
                    if (1 !== l && 9 !== l) return [];
                    if (a = o(t), !a && !r && (i = R.exec(e)))
                        if (f = i[1]) {
                            if (9 === l) {
                                if (s = t.getElementById(f), !s || !s.parentNode) return n;
                                if (s.id === f) return n.push(s), n
                            } else if (t.ownerDocument && (s = t.ownerDocument.getElementById(f)) && u(t, s) && s.id === f) return n.push(s), n
                        } else {
                            if (i[2]) return S.apply(n, x.call(t.getElementsByTagName(e), 0)), n;
                            if ((f = i[3]) && Z && t.getElementsByClassName) return S.apply(n, x.call(t.getElementsByClassName(f), 0)), n
                        }
                    return vt(e.replace(j, "$1"), t, n, r, a)
                }

                function rt(e) {
                    return function(t) {
                        var n = t.nodeName.toLowerCase();
                        return "input" === n && t.type === e
                    }
                }

                function it(e) {
                    return function(t) {
                        var n = t.nodeName.toLowerCase();
                        return ("input" === n || "button" === n) && t.type === e
                    }
                }

                function st(e) {
                    return N(function(t) {
                        return t = +t, N(function(n, r) {
                            for (var i, s = e([], n.length, t), o = s.length; o--;) n[i = s[o]] && (n[i] = !(r[i] = n[i]))
                        })
                    })
                }

                function ot(e, t, n) {
                    if (e === t) return n;
                    for (var r = e.nextSibling; r;) {
                        if (r === t) return -1;
                        r = r.nextSibling
                    }
                    return 1
                }

                function ut(e, t) {
                    var n, r, s, o, u, a, f, l = L[d][e + " "];
                    if (l) return t ? 0 : l.slice(0);
                    for (u = e, a = [], f = i.preFilter; u;) {
                        (!n || (r = F.exec(u))) && (r && (u = u.slice(r[0].length) || u), a.push(s = [])), n = !1, (r = I.exec(u)) && (s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = r[0].replace(j, " "));
                        for (o in i.filter)(r = J[o].exec(u)) && (!f[o] || (r = f[o](r))) && (s.push(n = new m(r.shift())), u = u.slice(n.length), n.type = o, n.matches = r);
                        if (!n) break
                    }
                    return t ? u.length : u ? nt.error(e) : L(e, a).slice(0)
                }

                function at(e, t, r) {
                    var i = t.dir,
                        s = r && "parentNode" === t.dir,
                        o = w++;
                    return t.first ? function(t, n, r) {
                        for (; t = t[i];)
                            if (s || 1 === t.nodeType) return e(t, n, r)
                    } : function(t, r, u) {
                        if (u) {
                            for (; t = t[i];)
                                if ((s || 1 === t.nodeType) && e(t, r, u)) return t
                        } else
                            for (var a, f = b + " " + o + " ", l = f + n; t = t[i];)
                                if (s || 1 === t.nodeType) {
                                    if ((a = t[d]) === l) return t.sizset;
                                    if ("string" == typeof a && 0 === a.indexOf(f)) {
                                        if (t.sizset) return t
                                    } else {
                                        if (t[d] = l, e(t, r, u)) return t.sizset = !0, t;
                                        t.sizset = !1
                                    }
                                }
                    }
                }

                function ft(e) {
                    return e.length > 1 ? function(t, n, r) {
                        for (var i = e.length; i--;)
                            if (!e[i](t, n, r)) return !1;
                        return !0
                    } : e[0]
                }

                function lt(e, t, n, r, i) {
                    for (var s, o = [], u = 0, a = e.length, f = null != t; a > u; u++)(s = e[u]) && (!n || n(s, r, i)) && (o.push(s), f && t.push(u));
                    return o
                }

                function ct(e, t, n, r, i, s) {
                    return r && !r[d] && (r = ct(r)), i && !i[d] && (i = ct(i, s)), N(function(s, o, u, a) {
                        var f, l, c, h = [],
                            p = [],
                            d = o.length,
                            v = s || dt(t || "*", u.nodeType ? [u] : u, []),
                            m = !e || !s && t ? v : lt(v, h, e, u, a),
                            g = n ? i || (s ? e : d || r) ? [] : o : m;
                        if (n && n(m, g, u, a), r)
                            for (f = lt(g, p), r(f, [], u, a), l = f.length; l--;)(c = f[l]) && (g[p[l]] = !(m[p[l]] = c));
                        if (s) {
                            if (i || e) {
                                if (i) {
                                    for (f = [], l = g.length; l--;)(c = g[l]) && f.push(m[l] = c);
                                    i(null, g = [], f, a)
                                }
                                for (l = g.length; l--;)(c = g[l]) && (f = i ? T.call(s, c) : h[l]) > -1 && (s[f] = !(o[f] = c))
                            }
                        } else g = lt(g === o ? g.splice(d, g.length) : g), i ? i(null, o, g, a) : S.apply(o, g)
                    })
                }

                function ht(e) {
                    for (var t, n, r, s = e.length, o = i.relative[e[0].type], u = o || i.relative[" "], a = o ? 1 : 0, f = at(function(e) {
                            return e === t
                        }, u, !0), l = at(function(e) {
                            return T.call(t, e) > -1
                        }, u, !0), h = [function(e, n, r) {
                            return !o && (r || n !== c) || ((t = n).nodeType ? f(e, n, r) : l(e, n, r))
                        }]; s > a; a++)
                        if (n = i.relative[e[a].type]) h = [at(ft(h), n)];
                        else {
                            if (n = i.filter[e[a].type].apply(null, e[a].matches), n[d]) {
                                for (r = ++a; s > r && !i.relative[e[r].type]; r++);
                                return ct(a > 1 && ft(h), a > 1 && e.slice(0, a - 1).join("").replace(j, "$1"), n, r > a && ht(e.slice(a, r)), s > r && ht(e = e.slice(r)), s > r && e.join(""))
                            }
                            h.push(n)
                        }
                    return ft(h)
                }

                function pt(e, t) {
                    var r = t.length > 0,
                        s = e.length > 0,
                        o = function(u, a, f, l, h) {
                            var p, d, v, m = [],
                                y = 0,
                                w = "0",
                                x = u && [],
                                T = null != h,
                                N = c,
                                C = u || s && i.find.TAG("*", h && a.parentNode || a),
                                k = b += null == N ? 1 : Math.E;
                            for (T && (c = a !== g && a, n = o.el); null != (p = C[w]); w++) {
                                if (s && p) {
                                    for (d = 0; v = e[d]; d++)
                                        if (v(p, a, f)) {
                                            l.push(p);
                                            break
                                        }
                                    T && (b = k, n = ++o.el)
                                }
                                r && ((p = !v && p) && y--, u && x.push(p))
                            }
                            if (y += w, r && w !== y) {
                                for (d = 0; v = t[d]; d++) v(x, m, a, f);
                                if (u) {
                                    if (y > 0)
                                        for (; w--;) !x[w] && !m[w] && (m[w] = E.call(l));
                                    m = lt(m)
                                }
                                S.apply(l, m), T && !u && m.length > 0 && y + t.length > 1 && nt.uniqueSort(l)
                            }
                            return T && (b = k, c = N), x
                        };
                    return o.el = 0, r ? N(o) : o
                }

                function dt(e, t, n) {
                    for (var r = 0, i = t.length; i > r; r++) nt(e, t[r], n);
                    return n
                }

                function vt(e, t, n, r, s) {
                    {
                        var o, u, f, l, c, h = ut(e);
                        h.length
                    }
                    if (!r && 1 === h.length) {
                        if (u = h[0] = h[0].slice(0), u.length > 2 && "ID" === (f = u[0]).type && 9 === t.nodeType && !s && i.relative[u[1].type]) {
                            if (t = i.find.ID(f.matches[0].replace($, ""), t, s)[0], !t) return n;
                            e = e.slice(u.shift().length)
                        }
                        for (o = J.POS.test(e) ? -1 : u.length - 1; o >= 0 && (f = u[o], !i.relative[l = f.type]); o--)
                            if ((c = i.find[l]) && (r = c(f.matches[0].replace($, ""), z.test(u[0].type) && t.parentNode || t, s))) {
                                if (u.splice(o, 1), e = r.length && u.join(""), !e) return S.apply(n, x.call(r, 0)), n;
                                break
                            }
                    }
                    return a(e, h)(r, t, s, n, z.test(e)), n
                }

                function mt() {}
                var n, r, i, s, o, u, a, f, l, c, h = !0,
                    p = "undefined",
                    d = ("sizcache" + Math.random()).replace(".", ""),
                    m = String,
                    g = e.document,
                    y = g.documentElement,
                    b = 0,
                    w = 0,
                    E = [].pop,
                    S = [].push,
                    x = [].slice,
                    T = [].indexOf || function(e) {
                        for (var t = 0, n = this.length; n > t; t++)
                            if (this[t] === e) return t;
                        return -1
                    },
                    N = function(e, t) {
                        return e[d] = null == t || t, e
                    },
                    C = function() {
                        var e = {},
                            t = [];
                        return N(function(n, r) {
                            return t.push(n) > i.cacheLength && delete e[t.shift()], e[n + " "] = r
                        }, e)
                    },
                    k = C(),
                    L = C(),
                    A = C(),
                    O = "[\\x20\\t\\r\\n\\f]",
                    M = "(?:\\\\.|[-\\w]|[^\\x00-\\xa0])+",
                    _ = M.replace("w", "w#"),
                    D = "([*^$|!~]?=)",
                    P = "\\[" + O + "*(" + M + ")" + O + "*(?:" + D + O + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + _ + ")|)|)" + O + "*\\]",
                    H = ":(" + M + ")(?:\\((?:(['\"])((?:\\\\.|[^\\\\])*?)\\2|([^()[\\]]*|(?:(?:" + P + ")|[^:]|\\\\.)*|.*))\\)|)",
                    B = ":(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + O + "*((?:-\\d)?\\d*)" + O + "*\\)|)(?=[^-]|$)",
                    j = new RegExp("^" + O + "+|((?:^|[^\\\\])(?:\\\\.)*)" + O + "+$", "g"),
                    F = new RegExp("^" + O + "*," + O + "*"),
                    I = new RegExp("^" + O + "*([\\x20\\t\\r\\n\\f>+~])" + O + "*"),
                    q = new RegExp(H),
                    R = /^(?:#([\w\-]+)|(\w+)|\.([\w\-]+))$/,
                    z = /[\x20\t\r\n\f]*[+~]/,
                    X = /h\d/i,
                    V = /input|select|textarea|button/i,
                    $ = /\\(?!\\)/g,
                    J = {
                        ID: new RegExp("^#(" + M + ")"),
                        CLASS: new RegExp("^\\.(" + M + ")"),
                        NAME: new RegExp("^\\[name=['\"]?(" + M + ")['\"]?\\]"),
                        TAG: new RegExp("^(" + M.replace("w", "w*") + ")"),
                        ATTR: new RegExp("^" + P),
                        PSEUDO: new RegExp("^" + H),
                        POS: new RegExp(B, "i"),
                        CHILD: new RegExp("^:(only|nth|first|last)-child(?:\\(" + O + "*(even|odd|(([+-]|)(\\d*)n|)" + O + "*(?:([+-]|)" + O + "*(\\d+)|))" + O + "*\\)|)", "i"),
                        needsContext: new RegExp("^" + O + "*[>+~]|" + B, "i")
                    },
                    K = function(e) {
                        var t = g.createElement("div");
                        try {
                            return e(t)
                        } catch (n) {
                            return !1
                        } finally {
                            t = null
                        }
                    },
                    Q = K(function(e) {
                        return e.appendChild(g.createComment("")), !e.getElementsByTagName("*").length
                    }),
                    G = K(function(e) {
                        return e.innerHTML = "<a href='#'></a>", e.firstChild && typeof e.firstChild.getAttribute !== p && "#" === e.firstChild.getAttribute("href")
                    }),
                    Y = K(function(e) {
                        e.innerHTML = "<select></select>";
                        var t = typeof e.lastChild.getAttribute("multiple");
                        return "boolean" !== t && "string" !== t
                    }),
                    Z = K(function(e) {
                        return e.innerHTML = "<div class='hidden e'></div><div class='hidden'></div>", e.getElementsByClassName && e.getElementsByClassName("e").length ? (e.lastChild.className = "e", 2 === e.getElementsByClassName("e").length) : !1
                    }),
                    et = K(function(e) {
                        e.id = d + 0, e.innerHTML = "<a name='" + d + "'></a><div name='" + d + "'></div>", y.insertBefore(e, y.firstChild);
                        var t = g.getElementsByName && g.getElementsByName(d).length === 2 + g.getElementsByName(d + 0).length;
                        return r = !g.getElementById(d), y.removeChild(e), t
                    });
                try {
                    x.call(y.childNodes, 0)[0].nodeType
                } catch (tt) {
                    x = function(e) {
                        for (var t, n = []; t = this[e]; e++) n.push(t);
                        return n
                    }
                }
                nt.matches = function(e, t) {
                    return nt(e, null, null, t)
                }, nt.matchesSelector = function(e, t) {
                    return nt(t, null, null, [e]).length > 0
                }, s = nt.getText = function(e) {
                    var t, n = "",
                        r = 0,
                        i = e.nodeType;
                    if (i) {
                        if (1 === i || 9 === i || 11 === i) {
                            if ("string" == typeof e.textContent) return e.textContent;
                            for (e = e.firstChild; e; e = e.nextSibling) n += s(e)
                        } else if (3 === i || 4 === i) return e.nodeValue
                    } else
                        for (; t = e[r]; r++) n += s(t);
                    return n
                }, o = nt.isXML = function(e) {
                    var t = e && (e.ownerDocument || e).documentElement;
                    return t ? "HTML" !== t.nodeName : !1
                }, u = nt.contains = y.contains ? function(e, t) {
                    var n = 9 === e.nodeType ? e.documentElement : e,
                        r = t && t.parentNode;
                    return e === r || !!(r && 1 === r.nodeType && n.contains && n.contains(r))
                } : y.compareDocumentPosition ? function(e, t) {
                    return t && !!(16 & e.compareDocumentPosition(t))
                } : function(e, t) {
                    for (; t = t.parentNode;)
                        if (t === e) return !0;
                    return !1
                }, nt.attr = function(e, t) {
                    var n, r = o(e);
                    return r || (t = t.toLowerCase()), (n = i.attrHandle[t]) ? n(e) : r || Y ? e.getAttribute(t) : (n = e.getAttributeNode(t), n ? "boolean" == typeof e[t] ? e[t] ? t : null : n.specified ? n.value : null : null)
                }, i = nt.selectors = {
                    cacheLength: 50,
                    createPseudo: N,
                    match: J,
                    attrHandle: G ? {} : {
                        href: function(e) {
                            return e.getAttribute("href", 2)
                        },
                        type: function(e) {
                            return e.getAttribute("type")
                        }
                    },
                    find: {
                        ID: r ? function(e, t, n) {
                            if (typeof t.getElementById !== p && !n) {
                                var r = t.getElementById(e);
                                return r && r.parentNode ? [r] : []
                            }
                        } : function(e, n, r) {
                            if (typeof n.getElementById !== p && !r) {
                                var i = n.getElementById(e);
                                return i ? i.id === e || typeof i.getAttributeNode !== p && i.getAttributeNode("id").value === e ? [i] : t : []
                            }
                        },
                        TAG: Q ? function(e, t) {
                            return typeof t.getElementsByTagName !== p ? t.getElementsByTagName(e) : void 0
                        } : function(e, t) {
                            var n = t.getElementsByTagName(e);
                            if ("*" === e) {
                                for (var r, i = [], s = 0; r = n[s]; s++) 1 === r.nodeType && i.push(r);
                                return i
                            }
                            return n
                        },
                        NAME: et && function(e, t) {
                            return typeof t.getElementsByName !== p ? t.getElementsByName(name) : void 0
                        },
                        CLASS: Z && function(e, t, n) {
                            return typeof t.getElementsByClassName === p || n ? void 0 : t.getElementsByClassName(e)
                        }
                    },
                    relative: {
                        ">": {
                            dir: "parentNode",
                            first: !0
                        },
                        " ": {
                            dir: "parentNode"
                        },
                        "+": {
                            dir: "previousSibling",
                            first: !0
                        },
                        "~": {
                            dir: "previousSibling"
                        }
                    },
                    preFilter: {
                        ATTR: function(e) {
                            return e[1] = e[1].replace($, ""), e[3] = (e[4] || e[5] || "").replace($, ""), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                        },
                        CHILD: function(e) {
                            return e[1] = e[1].toLowerCase(), "nth" === e[1] ? (e[2] || nt.error(e[0]), e[3] = +(e[3] ? e[4] + (e[5] || 1) : 2 * ("even" === e[2] || "odd" === e[2])), e[4] = +(e[6] + e[7] || "odd" === e[2])) : e[2] && nt.error(e[0]), e
                        },
                        PSEUDO: function(e) {
                            var t, n;
                            return J.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[3] : (t = e[4]) && (q.test(t) && (n = ut(t, !0)) && (n = t.indexOf(")", t.length - n) - t.length) && (t = t.slice(0, n), e[0] = e[0].slice(0, n)), e[2] = t), e.slice(0, 3))
                        }
                    },
                    filter: {
                        ID: r ? function(e) {
                            return e = e.replace($, ""),
                                function(t) {
                                    return t.getAttribute("id") === e
                                }
                        } : function(e) {
                            return e = e.replace($, ""),
                                function(t) {
                                    var n = typeof t.getAttributeNode !== p && t.getAttributeNode("id");
                                    return n && n.value === e
                                }
                        },
                        TAG: function(e) {
                            return "*" === e ? function() {
                                return !0
                            } : (e = e.replace($, "").toLowerCase(), function(t) {
                                return t.nodeName && t.nodeName.toLowerCase() === e
                            })
                        },
                        CLASS: function(e) {
                            var t = k[d][e + " "];
                            return t || (t = new RegExp("(^|" + O + ")" + e + "(" + O + "|$)")) && k(e, function(e) {
                                return t.test(e.className || typeof e.getAttribute !== p && e.getAttribute("class") || "")
                            })
                        },
                        ATTR: function(e, t, n) {
                            return function(r) {
                                var s = nt.attr(r, e);
                                return null == s ? "!=" === t : t ? (s += "", "=" === t ? s === n : "!=" === t ? s !== n : "^=" === t ? n && 0 === s.indexOf(n) : "*=" === t ? n && s.indexOf(n) > -1 : "$=" === t ? n && s.substr(s.length - n.length) === n : "~=" === t ? (" " + s + " ").indexOf(n) > -1 : "|=" === t ? s === n || s.substr(0, n.length + 1) === n + "-" : !1) : !0
                            }
                        },
                        CHILD: function(e, t, n, r) {
                            return "nth" === e ? function(e) {
                                var t, i, s = e.parentNode;
                                if (1 === n && 0 === r) return !0;
                                if (s)
                                    for (i = 0, t = s.firstChild; t && (1 !== t.nodeType || (i++, e !== t)); t = t.nextSibling);
                                return i -= r, i === n || i % n === 0 && i / n >= 0
                            } : function(t) {
                                var n = t;
                                switch (e) {
                                    case "only":
                                    case "first":
                                        for (; n = n.previousSibling;)
                                            if (1 === n.nodeType) return !1;
                                        if ("first" === e) return !0;
                                        n = t;
                                    case "last":
                                        for (; n = n.nextSibling;)
                                            if (1 === n.nodeType) return !1;
                                        return !0
                                }
                            }
                        },
                        PSEUDO: function(e, t) {
                            var n, r = i.pseudos[e] || i.setFilters[e.toLowerCase()] || nt.error("unsupported pseudo: " + e);
                            return r[d] ? r(t) : r.length > 1 ? (n = [e, e, "", t], i.setFilters.hasOwnProperty(e.toLowerCase()) ? N(function(e, n) {
                                for (var i, s = r(e, t), o = s.length; o--;) i = T.call(e, s[o]), e[i] = !(n[i] = s[o])
                            }) : function(e) {
                                return r(e, 0, n)
                            }) : r
                        }
                    },
                    pseudos: {
                        not: N(function(e) {
                            var t = [],
                                n = [],
                                r = a(e.replace(j, "$1"));
                            return r[d] ? N(function(e, t, n, i) {
                                for (var s, o = r(e, null, i, []), u = e.length; u--;)(s = o[u]) && (e[u] = !(t[u] = s))
                            }) : function(e, i, s) {
                                return t[0] = e, r(t, null, s, n), !n.pop()
                            }
                        }),
                        has: N(function(e) {
                            return function(t) {
                                return nt(e, t).length > 0
                            }
                        }),
                        contains: N(function(e) {
                            return function(t) {
                                return (t.textContent || t.innerText || s(t)).indexOf(e) > -1
                            }
                        }),
                        enabled: function(e) {
                            return e.disabled === !1
                        },
                        disabled: function(e) {
                            return e.disabled === !0
                        },
                        checked: function(e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && !!e.checked || "option" === t && !!e.selected
                        },
                        selected: function(e) {
                            return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
                        },
                        parent: function(e) {
                            return !i.pseudos.empty(e)
                        },
                        empty: function(e) {
                            var t;
                            for (e = e.firstChild; e;) {
                                if (e.nodeName > "@" || 3 === (t = e.nodeType) || 4 === t) return !1;
                                e = e.nextSibling
                            }
                            return !0
                        },
                        header: function(e) {
                            return X.test(e.nodeName)
                        },
                        text: function(e) {
                            var t, n;
                            return "input" === e.nodeName.toLowerCase() && "text" === (t = e.type) && (null == (n = e.getAttribute("type")) || n.toLowerCase() === t)
                        },
                        radio: rt("radio"),
                        checkbox: rt("checkbox"),
                        file: rt("file"),
                        password: rt("password"),
                        image: rt("image"),
                        submit: it("submit"),
                        reset: it("reset"),
                        button: function(e) {
                            var t = e.nodeName.toLowerCase();
                            return "input" === t && "button" === e.type || "button" === t
                        },
                        input: function(e) {
                            return V.test(e.nodeName)
                        },
                        focus: function(e) {
                            var t = e.ownerDocument;
                            return e === t.activeElement && (!t.hasFocus || t.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                        },
                        active: function(e) {
                            return e === e.ownerDocument.activeElement
                        },
                        first: st(function() {
                            return [0]
                        }),
                        last: st(function(e, t) {
                            return [t - 1]
                        }),
                        eq: st(function(e, t, n) {
                            return [0 > n ? n + t : n]
                        }),
                        even: st(function(e, t) {
                            for (var n = 0; t > n; n += 2) e.push(n);
                            return e
                        }),
                        odd: st(function(e, t) {
                            for (var n = 1; t > n; n += 2) e.push(n);
                            return e
                        }),
                        lt: st(function(e, t, n) {
                            for (var r = 0 > n ? n + t : n; --r >= 0;) e.push(r);
                            return e
                        }),
                        gt: st(function(e, t, n) {
                            for (var r = 0 > n ? n + t : n; ++r < t;) e.push(r);
                            return e
                        })
                    }
                }, f = y.compareDocumentPosition ? function(e, t) {
                    return e === t ? (l = !0, 0) : (e.compareDocumentPosition && t.compareDocumentPosition ? 4 & e.compareDocumentPosition(t) : e.compareDocumentPosition) ? -1 : 1
                } : function(e, t) {
                    if (e === t) return l = !0, 0;
                    if (e.sourceIndex && t.sourceIndex) return e.sourceIndex - t.sourceIndex;
                    var n, r, i = [],
                        s = [],
                        o = e.parentNode,
                        u = t.parentNode,
                        a = o;
                    if (o === u) return ot(e, t);
                    if (!o) return -1;
                    if (!u) return 1;
                    for (; a;) i.unshift(a), a = a.parentNode;
                    for (a = u; a;) s.unshift(a), a = a.parentNode;
                    n = i.length, r = s.length;
                    for (var f = 0; n > f && r > f; f++)
                        if (i[f] !== s[f]) return ot(i[f], s[f]);
                    return f === n ? ot(e, s[f], -1) : ot(i[f], t, 1)
                }, [0, 0].sort(f), h = !l, nt.uniqueSort = function(e) {
                    var t, n = [],
                        r = 1,
                        i = 0;
                    if (l = h, e.sort(f), l) {
                        for (; t = e[r]; r++) t === e[r - 1] && (i = n.push(r));
                        for (; i--;) e.splice(n[i], 1)
                    }
                    return e
                }, nt.error = function(e) {
                    throw new Error("Syntax error, unrecognized expression: " + e)
                }, a = nt.compile = function(e, t) {
                    var n, r = [],
                        i = [],
                        s = A[d][e + " "];
                    if (!s) {
                        for (t || (t = ut(e)), n = t.length; n--;) s = ht(t[n]), s[d] ? r.push(s) : i.push(s);
                        s = A(e, pt(i, r))
                    }
                    return s
                }, g.querySelectorAll && function() {
                    var e, t = vt,
                        n = /'|\\/g,
                        r = /\=[\x20\t\r\n\f]*([^'"\]]*)[\x20\t\r\n\f]*\]/g,
                        i = [":focus"],
                        s = [":active"],
                        u = y.matchesSelector || y.mozMatchesSelector || y.webkitMatchesSelector || y.oMatchesSelector || y.msMatchesSelector;
                    K(function(e) {
                        e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || i.push("\\[" + O + "*(?:checked|disabled|ismap|multiple|readonly|selected|value)"), e.querySelectorAll(":checked").length || i.push(":checked")
                    }), K(function(e) {
                        e.innerHTML = "<p test=''></p>", e.querySelectorAll("[test^='']").length && i.push("[*^$]=" + O + "*(?:\"\"|'')"), e.innerHTML = "<input type='hidden'/>", e.querySelectorAll(":enabled").length || i.push(":enabled", ":disabled")
                    }), i = new RegExp(i.join("|")), vt = function(e, r, s, o, u) {
                        if (!o && !u && !i.test(e)) {
                            var a, f, l = !0,
                                c = d,
                                h = r,
                                p = 9 === r.nodeType && e;
                            if (1 === r.nodeType && "object" !== r.nodeName.toLowerCase()) {
                                for (a = ut(e), (l = r.getAttribute("id")) ? c = l.replace(n, "\\$&") : r.setAttribute("id", c), c = "[id='" + c + "'] ", f = a.length; f--;) a[f] = c + a[f].join("");
                                h = z.test(e) && r.parentNode || r, p = a.join(",")
                            }
                            if (p) try {
                                return S.apply(s, x.call(h.querySelectorAll(p), 0)), s
                            } catch (v) {} finally {
                                l || r.removeAttribute("id")
                            }
                        }
                        return t(e, r, s, o, u)
                    }, u && (K(function(t) {
                        e = u.call(t, "div");
                        try {
                            u.call(t, "[test!='']:sizzle"), s.push("!=", H)
                        } catch (n) {}
                    }), s = new RegExp(s.join("|")), nt.matchesSelector = function(t, n) {
                        if (n = n.replace(r, "='$1']"), !o(t) && !s.test(n) && !i.test(n)) try {
                            var a = u.call(t, n);
                            if (a || e || t.document && 11 !== t.document.nodeType) return a
                        } catch (f) {}
                        return nt(n, null, null, [t]).length > 0
                    })
                }(), i.pseudos.nth = i.pseudos.eq, i.filters = mt.prototype = i.pseudos, i.setFilters = new mt, nt.attr = v.attr, v.find = nt, v.expr = nt.selectors, v.expr[":"] = v.expr.pseudos, v.unique = nt.uniqueSort, v.text = nt.getText, v.isXMLDoc = nt.isXML, v.contains = nt.contains
            }(e);
        var nt = /Until$/,
            rt = /^(?:parents|prev(?:Until|All))/,
            it = /^.[^:#\[\.,]*$/,
            st = v.expr.match.needsContext,
            ot = {
                children: !0,
                contents: !0,
                next: !0,
                prev: !0
            };
        v.fn.extend({
            find: function(e) {
                var t, n, r, i, s, o, u = this;
                if ("string" != typeof e) return v(e).filter(function() {
                    for (t = 0, n = u.length; n > t; t++)
                        if (v.contains(u[t], this)) return !0
                });
                for (o = this.pushStack("", "find", e), t = 0, n = this.length; n > t; t++)
                    if (r = o.length, v.find(e, this[t], o), t > 0)
                        for (i = r; i < o.length; i++)
                            for (s = 0; r > s; s++)
                                if (o[s] === o[i]) {
                                    o.splice(i--, 1);
                                    break
                                }
                return o
            },
            has: function(e) {
                var t, n = v(e, this),
                    r = n.length;
                return this.filter(function() {
                    for (t = 0; r > t; t++)
                        if (v.contains(this, n[t])) return !0
                })
            },
            not: function(e) {
                return this.pushStack(ft(this, e, !1), "not", e)
            },
            filter: function(e) {
                return this.pushStack(ft(this, e, !0), "filter", e)
            },
            is: function(e) {
                return !!e && ("string" == typeof e ? st.test(e) ? v(e, this.context).index(this[0]) >= 0 : v.filter(e, this).length > 0 : this.filter(e).length > 0)
            },
            closest: function(e, t) {
                for (var n, r = 0, i = this.length, s = [], o = st.test(e) || "string" != typeof e ? v(e, t || this.context) : 0; i > r; r++)
                    for (n = this[r]; n && n.ownerDocument && n !== t && 11 !== n.nodeType;) {
                        if (o ? o.index(n) > -1 : v.find.matchesSelector(n, e)) {
                            s.push(n);
                            break
                        }
                        n = n.parentNode
                    }
                return s = s.length > 1 ? v.unique(s) : s, this.pushStack(s, "closest", e)
            },
            index: function(e) {
                return e ? "string" == typeof e ? v.inArray(this[0], v(e)) : v.inArray(e.jquery ? e[0] : e, this) : this[0] && this[0].parentNode ? this.prevAll().length : -1
            },
            add: function(e, t) {
                var n = "string" == typeof e ? v(e, t) : v.makeArray(e && e.nodeType ? [e] : e),
                    r = v.merge(this.get(), n);
                return this.pushStack(ut(n[0]) || ut(r[0]) ? r : v.unique(r))
            },
            addBack: function(e) {
                return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
            }
        }), v.fn.andSelf = v.fn.addBack, v.each({
            parent: function(e) {
                var t = e.parentNode;
                return t && 11 !== t.nodeType ? t : null
            },
            parents: function(e) {
                return v.dir(e, "parentNode")
            },
            parentsUntil: function(e, t, n) {
                return v.dir(e, "parentNode", n)
            },
            next: function(e) {
                return at(e, "nextSibling")
            },
            prev: function(e) {
                return at(e, "previousSibling")
            },
            nextAll: function(e) {
                return v.dir(e, "nextSibling")
            },
            prevAll: function(e) {
                return v.dir(e, "previousSibling")
            },
            nextUntil: function(e, t, n) {
                return v.dir(e, "nextSibling", n)
            },
            prevUntil: function(e, t, n) {
                return v.dir(e, "previousSibling", n)
            },
            siblings: function(e) {
                return v.sibling((e.parentNode || {}).firstChild, e)
            },
            children: function(e) {
                return v.sibling(e.firstChild)
            },
            contents: function(e) {
                return v.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : v.merge([], e.childNodes)
            }
        }, function(e, t) {
            v.fn[e] = function(n, r) {
                var i = v.map(this, t, n);
                return nt.test(e) || (r = n), r && "string" == typeof r && (i = v.filter(r, i)), i = this.length > 1 && !ot[e] ? v.unique(i) : i, this.length > 1 && rt.test(e) && (i = i.reverse()), this.pushStack(i, e, l.call(arguments).join(","))
            }
        }), v.extend({
            filter: function(e, t, n) {
                return n && (e = ":not(" + e + ")"), 1 === t.length ? v.find.matchesSelector(t[0], e) ? [t[0]] : [] : v.find.matches(e, t)
            },
            dir: function(e, n, r) {
                for (var i = [], s = e[n]; s && 9 !== s.nodeType && (r === t || 1 !== s.nodeType || !v(s).is(r));) 1 === s.nodeType && i.push(s), s = s[n];
                return i
            },
            sibling: function(e, t) {
                for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                return n
            }
        });
        var ct = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
            ht = / jQuery\d+="(?:null|\d+)"/g,
            pt = /^\s+/,
            dt = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
            vt = /<([\w:]+)/,
            mt = /<tbody/i,
            gt = /<|&#?\w+;/,
            yt = /<(?:script|style|link)/i,
            bt = /<(?:script|object|embed|option|style)/i,
            wt = new RegExp("<(?:" + ct + ")[\\s/>]", "i"),
            Et = /^(?:checkbox|radio)$/,
            St = /checked\s*(?:[^=]|=\s*.checked.)/i,
            xt = /\/(java|ecma)script/i,
            Tt = /^\s*<!(?:\[CDATA\[|\-\-)|[\]\-]{2}>\s*$/g,
            Nt = {
                option: [1, "<select multiple='multiple'>", "</select>"],
                legend: [1, "<fieldset>", "</fieldset>"],
                thead: [1, "<table>", "</table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
                area: [1, "<map>", "</map>"],
                _default: [0, "", ""]
            },
            Ct = lt(i),
            kt = Ct.appendChild(i.createElement("div"));
        Nt.optgroup = Nt.option, Nt.tbody = Nt.tfoot = Nt.colgroup = Nt.caption = Nt.thead, Nt.th = Nt.td, v.support.htmlSerialize || (Nt._default = [1, "X<div>", "</div>"]), v.fn.extend({
                text: function(e) {
                    return v.access(this, function(e) {
                        return e === t ? v.text(this) : this.empty().append((this[0] && this[0].ownerDocument || i).createTextNode(e))
                    }, null, e, arguments.length)
                },
                wrapAll: function(e) {
                    if (v.isFunction(e)) return this.each(function(t) {
                        v(this).wrapAll(e.call(this, t))
                    });
                    if (this[0]) {
                        var t = v(e, this[0].ownerDocument).eq(0).clone(!0);
                        this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
                            for (var e = this; e.firstChild && 1 === e.firstChild.nodeType;) e = e.firstChild;
                            return e
                        }).append(this)
                    }
                    return this
                },
                wrapInner: function(e) {
                    return this.each(v.isFunction(e) ? function(t) {
                        v(this).wrapInner(e.call(this, t))
                    } : function() {
                        var t = v(this),
                            n = t.contents();
                        n.length ? n.wrapAll(e) : t.append(e)
                    })
                },
                wrap: function(e) {
                    var t = v.isFunction(e);
                    return this.each(function(n) {
                        v(this).wrapAll(t ? e.call(this, n) : e)
                    })
                },
                unwrap: function() {
                    return this.parent().each(function() {
                        v.nodeName(this, "body") || v(this).replaceWith(this.childNodes)
                    }).end()
                },
                append: function() {
                    return this.domManip(arguments, !0, function(e) {
                        (1 === this.nodeType || 11 === this.nodeType) && this.appendChild(e)
                    })
                },
                prepend: function() {
                    return this.domManip(arguments, !0, function(e) {
                        (1 === this.nodeType || 11 === this.nodeType) && this.insertBefore(e, this.firstChild)
                    })
                },
                before: function() {
                    if (!ut(this[0])) return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this)
                    });
                    if (arguments.length) {
                        var e = v.clean(arguments);
                        return this.pushStack(v.merge(e, this), "before", this.selector)
                    }
                },
                after: function() {
                    if (!ut(this[0])) return this.domManip(arguments, !1, function(e) {
                        this.parentNode.insertBefore(e, this.nextSibling)
                    });
                    if (arguments.length) {
                        var e = v.clean(arguments);
                        return this.pushStack(v.merge(this, e), "after", this.selector)
                    }
                },
                remove: function(e, t) {
                    for (var n, r = 0; null != (n = this[r]); r++)(!e || v.filter(e, [n]).length) && (!t && 1 === n.nodeType && (v.cleanData(n.getElementsByTagName("*")), v.cleanData([n])), n.parentNode && n.parentNode.removeChild(n));
                    return this
                },
                empty: function() {
                    for (var e, t = 0; null != (e = this[t]); t++)
                        for (1 === e.nodeType && v.cleanData(e.getElementsByTagName("*")); e.firstChild;) e.removeChild(e.firstChild);
                    return this
                },
                clone: function(e, t) {
                    return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
                        return v.clone(this, e, t)
                    })
                },
                html: function(e) {
                    return v.access(this, function(e) {
                        var n = this[0] || {},
                            r = 0,
                            i = this.length;
                        if (e === t) return 1 === n.nodeType ? n.innerHTML.replace(ht, "") : t;
                        if (!("string" != typeof e || yt.test(e) || !v.support.htmlSerialize && wt.test(e) || !v.support.leadingWhitespace && pt.test(e) || Nt[(vt.exec(e) || ["", ""])[1].toLowerCase()])) {
                            e = e.replace(dt, "<$1></$2>");
                            try {
                                for (; i > r; r++) n = this[r] || {}, 1 === n.nodeType && (v.cleanData(n.getElementsByTagName("*")), n.innerHTML = e);
                                n = 0
                            } catch (s) {}
                        }
                        n && this.empty().append(e)
                    }, null, e, arguments.length)
                },
                replaceWith: function(e) {
                    return ut(this[0]) ? this.length ? this.pushStack(v(v.isFunction(e) ? e() : e), "replaceWith", e) : this : v.isFunction(e) ? this.each(function(t) {
                        var n = v(this),
                            r = n.html();
                        n.replaceWith(e.call(this, t, r))
                    }) : ("string" != typeof e && (e = v(e).detach()), this.each(function() {
                        var t = this.nextSibling,
                            n = this.parentNode;
                        v(this).remove(), t ? v(t).before(e) : v(n).append(e)
                    }))
                },
                detach: function(e) {
                    return this.remove(e, !0)
                },
                domManip: function(e, n, r) {
                    e = [].concat.apply([], e);
                    var i, s, o, u, a = 0,
                        f = e[0],
                        l = [],
                        c = this.length;
                    if (!v.support.checkClone && c > 1 && "string" == typeof f && St.test(f)) return this.each(function() {
                        v(this).domManip(e, n, r)
                    });
                    if (v.isFunction(f)) return this.each(function(i) {
                        var s = v(this);
                        e[0] = f.call(this, i, n ? s.html() : t), s.domManip(e, n, r)
                    });
                    if (this[0]) {
                        if (i = v.buildFragment(e, this, l), o = i.fragment, s = o.firstChild, 1 === o.childNodes.length && (o = s), s)
                            for (n = n && v.nodeName(s, "tr"), u = i.cacheable || c - 1; c > a; a++) r.call(n && v.nodeName(this[a], "table") ? Lt(this[a], "tbody") : this[a], a === u ? o : v.clone(o, !0, !0));
                        o = s = null, l.length && v.each(l, function(e, t) {
                            t.src ? v.ajax ? v.ajax({
                                url: t.src,
                                type: "GET",
                                dataType: "script",
                                async: !1,
                                global: !1,
                                "throws": !0
                            }) : v.error("no ajax") : v.globalEval((t.text || t.textContent || t.innerHTML || "").replace(Tt, "")), t.parentNode && t.parentNode.removeChild(t)
                        })
                    }
                    return this
                }
            }), v.buildFragment = function(e, n, r) {
                var s, o, u, a = e[0];
                return n = n || i, n = !n.nodeType && n[0] || n, n = n.ownerDocument || n, 1 === e.length && "string" == typeof a && a.length < 512 && n === i && "<" === a.charAt(0) && !bt.test(a) && (v.support.checkClone || !St.test(a)) && (v.support.html5Clone || !wt.test(a)) && (o = !0, s = v.fragments[a], u = s !== t), s || (s = n.createDocumentFragment(), v.clean(e, n, s, r), o && (v.fragments[a] = u && s)), {
                    fragment: s,
                    cacheable: o
                }
            }, v.fragments = {}, v.each({
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith"
            }, function(e, t) {
                v.fn[e] = function(n) {
                    var r, i = 0,
                        s = [],
                        o = v(n),
                        u = o.length,
                        a = 1 === this.length && this[0].parentNode;
                    if ((null == a || a && 11 === a.nodeType && 1 === a.childNodes.length) && 1 === u) return o[t](this[0]), this;
                    for (; u > i; i++) r = (i > 0 ? this.clone(!0) : this).get(), v(o[i])[t](r), s = s.concat(r);
                    return this.pushStack(s, e, o.selector)
                }
            }), v.extend({
                clone: function(e, t, n) {
                    var r, i, s, o;
                    if (v.support.html5Clone || v.isXMLDoc(e) || !wt.test("<" + e.nodeName + ">") ? o = e.cloneNode(!0) : (kt.innerHTML = e.outerHTML, kt.removeChild(o = kt.firstChild)), !(v.support.noCloneEvent && v.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || v.isXMLDoc(e)))
                        for (Ot(e, o), r = Mt(e), i = Mt(o), s = 0; r[s]; ++s) i[s] && Ot(r[s], i[s]);
                    if (t && (At(e, o), n))
                        for (r = Mt(e), i = Mt(o), s = 0; r[s]; ++s) At(r[s], i[s]);
                    return r = i = null, o
                },
                clean: function(e, t, n, r) {
                    var s, o, u, a, f, l, c, h, p, m, g, y = t === i && Ct,
                        b = [];
                    for (t && "undefined" != typeof t.createDocumentFragment || (t = i), s = 0; null != (u = e[s]); s++)
                        if ("number" == typeof u && (u += ""), u) {
                            if ("string" == typeof u)
                                if (gt.test(u)) {
                                    for (y = y || lt(t), c = t.createElement("div"), y.appendChild(c), u = u.replace(dt, "<$1></$2>"), a = (vt.exec(u) || ["", ""])[1].toLowerCase(), f = Nt[a] || Nt._default, l = f[0], c.innerHTML = f[1] + u + f[2]; l--;) c = c.lastChild;
                                    if (!v.support.tbody)
                                        for (h = mt.test(u), p = "table" !== a || h ? "<table>" !== f[1] || h ? [] : c.childNodes : c.firstChild && c.firstChild.childNodes, o = p.length - 1; o >= 0; --o) v.nodeName(p[o], "tbody") && !p[o].childNodes.length && p[o].parentNode.removeChild(p[o]);
                                    !v.support.leadingWhitespace && pt.test(u) && c.insertBefore(t.createTextNode(pt.exec(u)[0]), c.firstChild), u = c.childNodes, c.parentNode.removeChild(c)
                                } else u = t.createTextNode(u);
                            u.nodeType ? b.push(u) : v.merge(b, u)
                        }
                    if (c && (u = c = y = null), !v.support.appendChecked)
                        for (s = 0; null != (u = b[s]); s++) v.nodeName(u, "input") ? _t(u) : "undefined" != typeof u.getElementsByTagName && v.grep(u.getElementsByTagName("input"), _t);
                    if (n)
                        for (m = function(e) {
                                return !e.type || xt.test(e.type) ? r ? r.push(e.parentNode ? e.parentNode.removeChild(e) : e) : n.appendChild(e) : void 0
                            }, s = 0; null != (u = b[s]); s++) v.nodeName(u, "script") && m(u) || (n.appendChild(u), "undefined" != typeof u.getElementsByTagName && (g = v.grep(v.merge([], u.getElementsByTagName("script")), m), b.splice.apply(b, [s + 1, 0].concat(g)), s += g.length));
                    return b
                },
                cleanData: function(e, t) {
                    for (var n, r, i, s, o = 0, u = v.expando, a = v.cache, f = v.support.deleteExpando, l = v.event.special; null != (i = e[o]); o++)
                        if ((t || v.acceptData(i)) && (r = i[u], n = r && a[r])) {
                            if (n.events)
                                for (s in n.events) l[s] ? v.event.remove(i, s) : v.removeEvent(i, s, n.handle);
                            a[r] && (delete a[r], f ? delete i[u] : i.removeAttribute ? i.removeAttribute(u) : i[u] = null, v.deletedIds.push(r))
                        }
                }
            }),
            function() {
                var e, t;
                v.uaMatch = function(e) {
                    e = e.toLowerCase();
                    var t = /(chrome)[ \/]([\w.]+)/.exec(e) || /(webkit)[ \/]([\w.]+)/.exec(e) || /(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e) || /(msie) ([\w.]+)/.exec(e) || e.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e) || [];
                    return {
                        browser: t[1] || "",
                        version: t[2] || "0"
                    }
                }, e = v.uaMatch(o.userAgent), t = {}, e.browser && (t[e.browser] = !0, t.version = e.version), t.chrome ? t.webkit = !0 : t.webkit && (t.safari = !0), v.browser = t, v.sub = function() {
                    function e(t, n) {
                        return new e.fn.init(t, n)
                    }
                    v.extend(!0, e, this), e.superclass = this, e.fn = e.prototype = this(), e.fn.constructor = e, e.sub = this.sub, e.fn.init = function(r, i) {
                        return i && i instanceof v && !(i instanceof e) && (i = e(i)), v.fn.init.call(this, r, i, t)
                    }, e.fn.init.prototype = e.fn;
                    var t = e(i);
                    return e
                }
            }();
        var Dt, Pt, Ht, Bt = /alpha\([^)]*\)/i,
            jt = /opacity=([^)]*)/,
            Ft = /^(top|right|bottom|left)$/,
            It = /^(none|table(?!-c[ea]).+)/,
            qt = /^margin/,
            Rt = new RegExp("^(" + m + ")(.*)$", "i"),
            Ut = new RegExp("^(" + m + ")(?!px)[a-z%]+$", "i"),
            zt = new RegExp("^([-+])=(" + m + ")", "i"),
            Wt = {
                BODY: "block"
            },
            Xt = {
                position: "absolute",
                visibility: "hidden",
                display: "block"
            },
            Vt = {
                letterSpacing: 0,
                fontWeight: 400
            },
            $t = ["Top", "Right", "Bottom", "Left"],
            Jt = ["Webkit", "O", "Moz", "ms"],
            Kt = v.fn.toggle;
        v.fn.extend({
            css: function(e, n) {
                return v.access(this, function(e, n, r) {
                    return r !== t ? v.style(e, n, r) : v.css(e, n)
                }, e, n, arguments.length > 1)
            },
            show: function() {
                return Yt(this, !0)
            },
            hide: function() {
                return Yt(this)
            },
            toggle: function(e, t) {
                var n = "boolean" == typeof e;
                return v.isFunction(e) && v.isFunction(t) ? Kt.apply(this, arguments) : this.each(function() {
                    (n ? e : Gt(this)) ? v(this).show(): v(this).hide()
                })
            }
        }), v.extend({
            cssHooks: {
                opacity: {
                    get: function(e, t) {
                        if (t) {
                            var n = Dt(e, "opacity");
                            return "" === n ? "1" : n
                        }
                    }
                }
            },
            cssNumber: {
                fillOpacity: !0,
                fontWeight: !0,
                lineHeight: !0,
                opacity: !0,
                orphans: !0,
                widows: !0,
                zIndex: !0,
                zoom: !0
            },
            cssProps: {
                "float": v.support.cssFloat ? "cssFloat" : "styleFloat"
            },
            style: function(e, n, r, i) {
                if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                    var s, o, u, a = v.camelCase(n),
                        f = e.style;
                    if (n = v.cssProps[a] || (v.cssProps[a] = Qt(f, a)), u = v.cssHooks[n] || v.cssHooks[a], r === t) return u && "get" in u && (s = u.get(e, !1, i)) !== t ? s : f[n];
                    if (o = typeof r, "string" === o && (s = zt.exec(r)) && (r = (s[1] + 1) * s[2] + parseFloat(v.css(e, n)), o = "number"), !(null == r || "number" === o && isNaN(r) || ("number" === o && !v.cssNumber[a] && (r += "px"), u && "set" in u && (r = u.set(e, r, i)) === t))) try {
                        f[n] = r
                    } catch (l) {}
                }
            },
            css: function(e, n, r, i) {
                var s, o, u, a = v.camelCase(n);
                return n = v.cssProps[a] || (v.cssProps[a] = Qt(e.style, a)), u = v.cssHooks[n] || v.cssHooks[a], u && "get" in u && (s = u.get(e, !0, i)), s === t && (s = Dt(e, n)), "normal" === s && n in Vt && (s = Vt[n]), r || i !== t ? (o = parseFloat(s), r || v.isNumeric(o) ? o || 0 : s) : s
            },
            swap: function(e, t, n) {
                var r, i, s = {};
                for (i in t) s[i] = e.style[i], e.style[i] = t[i];
                r = n.call(e);
                for (i in t) e.style[i] = s[i];
                return r
            }
        }), e.getComputedStyle ? Dt = function(t, n) {
            var r, i, s, o, u = e.getComputedStyle(t, null),
                a = t.style;
            return u && (r = u.getPropertyValue(n) || u[n], "" === r && !v.contains(t.ownerDocument, t) && (r = v.style(t, n)), Ut.test(r) && qt.test(n) && (i = a.width, s = a.minWidth, o = a.maxWidth, a.minWidth = a.maxWidth = a.width = r, r = u.width, a.width = i, a.minWidth = s, a.maxWidth = o)), r
        } : i.documentElement.currentStyle && (Dt = function(e, t) {
            var n, r, i = e.currentStyle && e.currentStyle[t],
                s = e.style;
            return null == i && s && s[t] && (i = s[t]), Ut.test(i) && !Ft.test(t) && (n = s.left, r = e.runtimeStyle && e.runtimeStyle.left, r && (e.runtimeStyle.left = e.currentStyle.left), s.left = "fontSize" === t ? "1em" : i, i = s.pixelLeft + "px", s.left = n, r && (e.runtimeStyle.left = r)), "" === i ? "auto" : i
        }), v.each(["height", "width"], function(e, t) {
            v.cssHooks[t] = {
                get: function(e, n, r) {
                    return n ? 0 === e.offsetWidth && It.test(Dt(e, "display")) ? v.swap(e, Xt, function() {
                        return tn(e, t, r)
                    }) : tn(e, t, r) : void 0
                },
                set: function(e, n, r) {
                    return Zt(e, n, r ? en(e, t, r, v.support.boxSizing && "border-box" === v.css(e, "boxSizing")) : 0)
                }
            }
        }), v.support.opacity || (v.cssHooks.opacity = {
            get: function(e, t) {
                return jt.test((t && e.currentStyle ? e.currentStyle.filter : e.style.filter) || "") ? .01 * parseFloat(RegExp.$1) + "" : t ? "1" : ""
            },
            set: function(e, t) {
                var n = e.style,
                    r = e.currentStyle,
                    i = v.isNumeric(t) ? "alpha(opacity=" + 100 * t + ")" : "",
                    s = r && r.filter || n.filter || "";
                n.zoom = 1, t >= 1 && "" === v.trim(s.replace(Bt, "")) && n.removeAttribute && (n.removeAttribute("filter"), r && !r.filter) || (n.filter = Bt.test(s) ? s.replace(Bt, i) : s + " " + i)
            }
        }), v(function() {
            v.support.reliableMarginRight || (v.cssHooks.marginRight = {
                get: function(e, t) {
                    return v.swap(e, {
                        display: "inline-block"
                    }, function() {
                        return t ? Dt(e, "marginRight") : void 0
                    })
                }
            }), !v.support.pixelPosition && v.fn.position && v.each(["top", "left"], function(e, t) {
                v.cssHooks[t] = {
                    get: function(e, n) {
                        if (n) {
                            var r = Dt(e, t);
                            return Ut.test(r) ? v(e).position()[t] + "px" : r
                        }
                    }
                }
            })
        }), v.expr && v.expr.filters && (v.expr.filters.hidden = function(e) {
            return 0 === e.offsetWidth && 0 === e.offsetHeight || !v.support.reliableHiddenOffsets && "none" === (e.style && e.style.display || Dt(e, "display"))
        }, v.expr.filters.visible = function(e) {
            return !v.expr.filters.hidden(e)
        }), v.each({
            margin: "",
            padding: "",
            border: "Width"
        }, function(e, t) {
            v.cssHooks[e + t] = {
                expand: function(n) {
                    var r, i = "string" == typeof n ? n.split(" ") : [n],
                        s = {};
                    for (r = 0; 4 > r; r++) s[e + $t[r] + t] = i[r] || i[r - 2] || i[0];
                    return s
                }
            }, qt.test(e) || (v.cssHooks[e + t].set = Zt)
        });
        var rn = /%20/g,
            sn = /\[\]$/,
            on = /\r?\n/g,
            un = /^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,
            an = /^(?:select|textarea)/i;
        v.fn.extend({
            serialize: function() {
                return v.param(this.serializeArray())
            },
            serializeArray: function() {
                return this.map(function() {
                    return this.elements ? v.makeArray(this.elements) : this
                }).filter(function() {
                    return this.name && !this.disabled && (this.checked || an.test(this.nodeName) || un.test(this.type))
                }).map(function(e, t) {
                    var n = v(this).val();
                    return null == n ? null : v.isArray(n) ? v.map(n, function(e) {
                        return {
                            name: t.name,
                            value: e.replace(on, "\r\n")
                        }
                    }) : {
                        name: t.name,
                        value: n.replace(on, "\r\n")
                    }
                }).get()
            }
        }), v.param = function(e, n) {
            var r, i = [],
                s = function(e, t) {
                    t = v.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
                };
            if (n === t && (n = v.ajaxSettings && v.ajaxSettings.traditional), v.isArray(e) || e.jquery && !v.isPlainObject(e)) v.each(e, function() {
                s(this.name, this.value)
            });
            else
                for (r in e) fn(r, e[r], n, s);
            return i.join("&").replace(rn, "+")
        };
        var ln, cn, hn = /#.*$/,
            pn = /^(.*?):[ \t]*([^\r\n]*)\r?$/gm,
            dn = /^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,
            vn = /^(?:GET|HEAD)$/,
            mn = /^\/\//,
            gn = /\?/,
            yn = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
            bn = /([?&])_=[^&]*/,
            wn = /^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
            En = v.fn.load,
            Sn = {},
            xn = {},
            Tn = ["*/"] + ["*"];
        try {
            cn = s.href
        } catch (Nn) {
            cn = i.createElement("a"), cn.href = "", cn = cn.href
        }
        ln = wn.exec(cn.toLowerCase()) || [], v.fn.load = function(e, n, r) {
            if ("string" != typeof e && En) return En.apply(this, arguments);
            if (!this.length) return this;
            var i, s, o, u = this,
                a = e.indexOf(" ");
            return a >= 0 && (i = e.slice(a, e.length), e = e.slice(0, a)), v.isFunction(n) ? (r = n, n = t) : n && "object" == typeof n && (s = "POST"), v.ajax({
                url: e,
                type: s,
                dataType: "html",
                data: n,
                complete: function(e, t) {
                    r && u.each(r, o || [e.responseText, t, e])
                }
            }).done(function(e) {
                o = arguments, u.html(i ? v("<div>").append(e.replace(yn, "")).find(i) : e)
            }), this
        }, v.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "), function(e, t) {
            v.fn[t] = function(e) {
                return this.on(t, e)
            }
        }), v.each(["get", "post"], function(e, n) {
            v[n] = function(e, r, i, s) {
                return v.isFunction(r) && (s = s || i, i = r, r = t), v.ajax({
                    type: n,
                    url: e,
                    data: r,
                    success: i,
                    dataType: s
                })
            }
        }), v.extend({
            getScript: function(e, n) {
                return v.get(e, t, n, "script")
            },
            getJSON: function(e, t, n) {
                return v.get(e, t, n, "json")
            },
            ajaxSetup: function(e, t) {
                return t ? Ln(e, v.ajaxSettings) : (t = e, e = v.ajaxSettings), Ln(e, t), e
            },
            ajaxSettings: {
                url: cn,
                isLocal: dn.test(ln[1]),
                global: !0,
                type: "GET",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                processData: !0,
                async: !0,
                accepts: {
                    xml: "application/xml, text/xml",
                    html: "text/html",
                    text: "text/plain",
                    json: "application/json, text/javascript",
                    "*": Tn
                },
                contents: {
                    xml: /xml/,
                    html: /html/,
                    json: /json/
                },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText"
                },
                converters: {
                    "* text": e.String,
                    "text html": !0,
                    "text json": v.parseJSON,
                    "text xml": v.parseXML
                },
                flatOptions: {
                    context: !0,
                    url: !0
                }
            },
            ajaxPrefilter: Cn(Sn),
            ajaxTransport: Cn(xn),
            ajax: function(e, n) {
                function T(e, n, s, a) {
                    var l, y, b, w, S, T = n;
                    2 !== E && (E = 2, u && clearTimeout(u), o = t, i = a || "", x.readyState = e > 0 ? 4 : 0, s && (w = An(c, x, s)), e >= 200 && 300 > e || 304 === e ? (c.ifModified && (S = x.getResponseHeader("Last-Modified"), S && (v.lastModified[r] = S), S = x.getResponseHeader("Etag"), S && (v.etag[r] = S)), 304 === e ? (T = "notmodified", l = !0) : (l = On(c, w), T = l.state, y = l.data, b = l.error, l = !b)) : (b = T, (!T || e) && (T = "error", 0 > e && (e = 0))), x.status = e, x.statusText = (n || T) + "", l ? d.resolveWith(h, [y, T, x]) : d.rejectWith(h, [x, T, b]), x.statusCode(g), g = t, f && p.trigger("ajax" + (l ? "Success" : "Error"), [x, c, l ? y : b]), m.fireWith(h, [x, T]), f && (p.trigger("ajaxComplete", [x, c]), --v.active || v.event.trigger("ajaxStop")))
                }
                "object" == typeof e && (n = e, e = t), n = n || {};
                var r, i, s, o, u, a, f, l, c = v.ajaxSetup({}, n),
                    h = c.context || c,
                    p = h !== c && (h.nodeType || h instanceof v) ? v(h) : v.event,
                    d = v.Deferred(),
                    m = v.Callbacks("once memory"),
                    g = c.statusCode || {},
                    b = {},
                    w = {},
                    E = 0,
                    S = "canceled",
                    x = {
                        readyState: 0,
                        setRequestHeader: function(e, t) {
                            if (!E) {
                                var n = e.toLowerCase();
                                e = w[n] = w[n] || e, b[e] = t
                            }
                            return this
                        },
                        getAllResponseHeaders: function() {
                            return 2 === E ? i : null
                        },
                        getResponseHeader: function(e) {
                            var n;
                            if (2 === E) {
                                if (!s)
                                    for (s = {}; n = pn.exec(i);) s[n[1].toLowerCase()] = n[2];
                                n = s[e.toLowerCase()]
                            }
                            return n === t ? null : n
                        },
                        overrideMimeType: function(e) {
                            return E || (c.mimeType = e), this
                        },
                        abort: function(e) {
                            return e = e || S, o && o.abort(e), T(0, e), this
                        }
                    };
                if (d.promise(x), x.success = x.done, x.error = x.fail, x.complete = m.add, x.statusCode = function(e) {
                        if (e) {
                            var t;
                            if (2 > E)
                                for (t in e) g[t] = [g[t], e[t]];
                            else t = e[x.status], x.always(t)
                        }
                        return this
                    }, c.url = ((e || c.url) + "").replace(hn, "").replace(mn, ln[1] + "//"), c.dataTypes = v.trim(c.dataType || "*").toLowerCase().split(y), null == c.crossDomain && (a = wn.exec(c.url.toLowerCase()), c.crossDomain = !(!a || a[1] === ln[1] && a[2] === ln[2] && (a[3] || ("http:" === a[1] ? 80 : 443)) == (ln[3] || ("http:" === ln[1] ? 80 : 443)))), c.data && c.processData && "string" != typeof c.data && (c.data = v.param(c.data, c.traditional)), kn(Sn, c, n, x), 2 === E) return x;
                if (f = c.global, c.type = c.type.toUpperCase(), c.hasContent = !vn.test(c.type), f && 0 === v.active++ && v.event.trigger("ajaxStart"), !c.hasContent && (c.data && (c.url += (gn.test(c.url) ? "&" : "?") + c.data, delete c.data), r = c.url, c.cache === !1)) {
                    var N = v.now(),
                        C = c.url.replace(bn, "$1_=" + N);
                    c.url = C + (C === c.url ? (gn.test(c.url) ? "&" : "?") + "_=" + N : "")
                }(c.data && c.hasContent && c.contentType !== !1 || n.contentType) && x.setRequestHeader("Content-Type", c.contentType), c.ifModified && (r = r || c.url, v.lastModified[r] && x.setRequestHeader("If-Modified-Since", v.lastModified[r]), v.etag[r] && x.setRequestHeader("If-None-Match", v.etag[r])), x.setRequestHeader("Accept", c.dataTypes[0] && c.accepts[c.dataTypes[0]] ? c.accepts[c.dataTypes[0]] + ("*" !== c.dataTypes[0] ? ", " + Tn + "; q=0.01" : "") : c.accepts["*"]);
                for (l in c.headers) x.setRequestHeader(l, c.headers[l]);
                if (!c.beforeSend || c.beforeSend.call(h, x, c) !== !1 && 2 !== E) {
                    S = "abort";
                    for (l in {
                            success: 1,
                            error: 1,
                            complete: 1
                        }) x[l](c[l]);
                    if (o = kn(xn, c, n, x)) {
                        x.readyState = 1, f && p.trigger("ajaxSend", [x, c]), c.async && c.timeout > 0 && (u = setTimeout(function() {
                            x.abort("timeout")
                        }, c.timeout));
                        try {
                            E = 1, o.send(b, T)
                        } catch (k) {
                            if (!(2 > E)) throw k;
                            T(-1, k)
                        }
                    } else T(-1, "No Transport");
                    return x
                }
                return x.abort()
            },
            active: 0,
            lastModified: {},
            etag: {}
        });
        var Mn = [],
            _n = /\?/,
            Dn = /(=)\?(?=&|$)|\?\?/,
            Pn = v.now();
        v.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function() {
                var e = Mn.pop() || v.expando + "_" + Pn++;
                return this[e] = !0, e
            }
        }), v.ajaxPrefilter("json jsonp", function(n, r, i) {
            var s, o, u, a = n.data,
                f = n.url,
                l = n.jsonp !== !1,
                c = l && Dn.test(f),
                h = l && !c && "string" == typeof a && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && Dn.test(a);
            return "jsonp" === n.dataTypes[0] || c || h ? (s = n.jsonpCallback = v.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, o = e[s], c ? n.url = f.replace(Dn, "$1" + s) : h ? n.data = a.replace(Dn, "$1" + s) : l && (n.url += (_n.test(f) ? "&" : "?") + n.jsonp + "=" + s), n.converters["script json"] = function() {
                return u || v.error(s + " was not called"), u[0]
            }, n.dataTypes[0] = "json", e[s] = function() {
                u = arguments
            }, i.always(function() {
                e[s] = o, n[s] && (n.jsonpCallback = r.jsonpCallback, Mn.push(s)), u && v.isFunction(o) && o(u[0]), u = o = t
            }), "script") : void 0
        }), v.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
            },
            contents: {
                script: /javascript|ecmascript/
            },
            converters: {
                "text script": function(e) {
                    return v.globalEval(e), e
                }
            }
        }), v.ajaxPrefilter("script", function(e) {
            e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET", e.global = !1)
        }), v.ajaxTransport("script", function(e) {
            if (e.crossDomain) {
                var n, r = i.head || i.getElementsByTagName("head")[0] || i.documentElement;
                return {
                    send: function(s, o) {
                        n = i.createElement("script"), n.async = "async", e.scriptCharset && (n.charset = e.scriptCharset), n.src = e.url, n.onload = n.onreadystatechange = function(e, i) {
                            (i || !n.readyState || /loaded|complete/.test(n.readyState)) && (n.onload = n.onreadystatechange = null, r && n.parentNode && r.removeChild(n), n = t, i || o(200, "success"))
                        }, r.insertBefore(n, r.firstChild)
                    },
                    abort: function() {
                        n && n.onload(0, 1)
                    }
                }
            }
        });
        var Hn, Bn = e.ActiveXObject ? function() {
                for (var e in Hn) Hn[e](0, 1)
            } : !1,
            jn = 0;
        v.ajaxSettings.xhr = e.ActiveXObject ? function() {
                return !this.isLocal && Fn() || In()
            } : Fn,
            function(e) {
                v.extend(v.support, {
                    ajax: !!e,
                    cors: !!e && "withCredentials" in e
                })
            }(v.ajaxSettings.xhr()), v.support.ajax && v.ajaxTransport(function(n) {
                if (!n.crossDomain || v.support.cors) {
                    var r;
                    return {
                        send: function(i, s) {
                            var o, u, a = n.xhr();
                            if (n.username ? a.open(n.type, n.url, n.async, n.username, n.password) : a.open(n.type, n.url, n.async), n.xhrFields)
                                for (u in n.xhrFields) a[u] = n.xhrFields[u];
                            n.mimeType && a.overrideMimeType && a.overrideMimeType(n.mimeType), !n.crossDomain && !i["X-Requested-With"] && (i["X-Requested-With"] = "XMLHttpRequest");
                            try {
                                for (u in i) a.setRequestHeader(u, i[u])
                            } catch (f) {}
                            a.send(n.hasContent && n.data || null), r = function(e, i) {
                                var u, f, l, c, h;
                                try {
                                    if (r && (i || 4 === a.readyState))
                                        if (r = t, o && (a.onreadystatechange = v.noop, Bn && delete Hn[o]), i) 4 !== a.readyState && a.abort();
                                        else {
                                            u = a.status, l = a.getAllResponseHeaders(), c = {}, h = a.responseXML, h && h.documentElement && (c.xml = h);
                                            try {
                                                c.text = a.responseText
                                            } catch (p) {}
                                            try {
                                                f = a.statusText
                                            } catch (p) {
                                                f = ""
                                            }
                                            u || !n.isLocal || n.crossDomain ? 1223 === u && (u = 204) : u = c.text ? 200 : 404
                                        }
                                } catch (d) {
                                    i || s(-1, d)
                                }
                                c && s(u, f, c, l)
                            }, n.async ? 4 === a.readyState ? setTimeout(r, 0) : (o = ++jn, Bn && (Hn || (Hn = {}, v(e).unload(Bn)), Hn[o] = r), a.onreadystatechange = r) : r()
                        },
                        abort: function() {
                            r && r(0, 1)
                        }
                    }
                }
            });
        var qn, Rn, Un = /^(?:toggle|show|hide)$/,
            zn = new RegExp("^(?:([-+])=|)(" + m + ")([a-z%]*)$", "i"),
            Wn = /queueHooks$/,
            Xn = [Gn],
            Vn = {
                "*": [function(e, t) {
                    var n, r, i = this.createTween(e, t),
                        s = zn.exec(t),
                        o = i.cur(),
                        u = +o || 0,
                        a = 1,
                        f = 20;
                    if (s) {
                        if (n = +s[2], r = s[3] || (v.cssNumber[e] ? "" : "px"), "px" !== r && u) {
                            u = v.css(i.elem, e, !0) || n || 1;
                            do a = a || ".5", u /= a, v.style(i.elem, e, u + r); while (a !== (a = i.cur() / o) && 1 !== a && --f)
                        }
                        i.unit = r, i.start = u, i.end = s[1] ? u + (s[1] + 1) * n : n
                    }
                    return i
                }]
            };
        v.Animation = v.extend(Kn, {
            tweener: function(e, t) {
                v.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
                for (var n, r = 0, i = e.length; i > r; r++) n = e[r], Vn[n] = Vn[n] || [], Vn[n].unshift(t)
            },
            prefilter: function(e, t) {
                t ? Xn.unshift(e) : Xn.push(e)
            }
        }), v.Tween = Yn, Yn.prototype = {
            constructor: Yn,
            init: function(e, t, n, r, i, s) {
                this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = s || (v.cssNumber[n] ? "" : "px")
            },
            cur: function() {
                var e = Yn.propHooks[this.prop];
                return e && e.get ? e.get(this) : Yn.propHooks._default.get(this)
            },
            run: function(e) {
                var t, n = Yn.propHooks[this.prop];
                return this.pos = t = this.options.duration ? v.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : Yn.propHooks._default.set(this), this
            }
        }, Yn.prototype.init.prototype = Yn.prototype, Yn.propHooks = {
            _default: {
                get: function(e) {
                    var t;
                    return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = v.css(e.elem, e.prop, !1, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
                },
                set: function(e) {
                    v.fx.step[e.prop] ? v.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[v.cssProps[e.prop]] || v.cssHooks[e.prop]) ? v.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
                }
            }
        }, Yn.propHooks.scrollTop = Yn.propHooks.scrollLeft = {
            set: function(e) {
                e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
            }
        }, v.each(["toggle", "show", "hide"], function(e, t) {
            var n = v.fn[t];
            v.fn[t] = function(r, i, s) {
                return null == r || "boolean" == typeof r || !e && v.isFunction(r) && v.isFunction(i) ? n.apply(this, arguments) : this.animate(Zn(t, !0), r, i, s)
            }
        }), v.fn.extend({
            fadeTo: function(e, t, n, r) {
                return this.filter(Gt).css("opacity", 0).show().end().animate({
                    opacity: t
                }, e, n, r)
            },
            animate: function(e, t, n, r) {
                var i = v.isEmptyObject(e),
                    s = v.speed(t, n, r),
                    o = function() {
                        var t = Kn(this, v.extend({}, e), s);
                        i && t.stop(!0)
                    };
                return i || s.queue === !1 ? this.each(o) : this.queue(s.queue, o)
            },
            stop: function(e, n, r) {
                var i = function(e) {
                    var t = e.stop;
                    delete e.stop, t(r)
                };
                return "string" != typeof e && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
                    var t = !0,
                        n = null != e && e + "queueHooks",
                        s = v.timers,
                        o = v._data(this);
                    if (n) o[n] && o[n].stop && i(o[n]);
                    else
                        for (n in o) o[n] && o[n].stop && Wn.test(n) && i(o[n]);
                    for (n = s.length; n--;) s[n].elem === this && (null == e || s[n].queue === e) && (s[n].anim.stop(r), t = !1, s.splice(n, 1));
                    (t || !r) && v.dequeue(this, e)
                })
            }
        }), v.each({
            slideDown: Zn("show"),
            slideUp: Zn("hide"),
            slideToggle: Zn("toggle"),
            fadeIn: {
                opacity: "show"
            },
            fadeOut: {
                opacity: "hide"
            },
            fadeToggle: {
                opacity: "toggle"
            }
        }, function(e, t) {
            v.fn[e] = function(e, n, r) {
                return this.animate(t, e, n, r)
            }
        }), v.speed = function(e, t, n) {
            var r = e && "object" == typeof e ? v.extend({}, e) : {
                complete: n || !n && t || v.isFunction(e) && e,
                duration: e,
                easing: n && t || t && !v.isFunction(t) && t
            };
            return r.duration = v.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in v.fx.speeds ? v.fx.speeds[r.duration] : v.fx.speeds._default, (null == r.queue || r.queue === !0) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
                v.isFunction(r.old) && r.old.call(this), r.queue && v.dequeue(this, r.queue)
            }, r
        }, v.easing = {
            linear: function(e) {
                return e
            },
            swing: function(e) {
                return .5 - Math.cos(e * Math.PI) / 2
            }
        }, v.timers = [], v.fx = Yn.prototype.init, v.fx.tick = function() {
            var e, n = v.timers,
                r = 0;
            for (qn = v.now(); r < n.length; r++) e = n[r], !e() && n[r] === e && n.splice(r--, 1);
            n.length || v.fx.stop(), qn = t
        }, v.fx.timer = function(e) {
            e() && v.timers.push(e) && !Rn && (Rn = setInterval(v.fx.tick, v.fx.interval))
        }, v.fx.interval = 13, v.fx.stop = function() {
            clearInterval(Rn), Rn = null
        }, v.fx.speeds = {
            slow: 600,
            fast: 200,
            _default: 400
        }, v.fx.step = {}, v.expr && v.expr.filters && (v.expr.filters.animated = function(e) {
            return v.grep(v.timers, function(t) {
                return e === t.elem
            }).length
        });
        var er = /^(?:body|html)$/i;
        v.fn.offset = function(e) {
            if (arguments.length) return e === t ? this : this.each(function(t) {
                v.offset.setOffset(this, e, t)
            });
            var n, r, i, s, o, u, a, f = {
                    top: 0,
                    left: 0
                },
                l = this[0],
                c = l && l.ownerDocument;
            if (c) return (r = c.body) === l ? v.offset.bodyOffset(l) : (n = c.documentElement, v.contains(n, l) ? ("undefined" != typeof l.getBoundingClientRect && (f = l.getBoundingClientRect()), i = tr(c), s = n.clientTop || r.clientTop || 0, o = n.clientLeft || r.clientLeft || 0, u = i.pageYOffset || n.scrollTop, a = i.pageXOffset || n.scrollLeft, {
                top: f.top + u - s,
                left: f.left + a - o
            }) : f)
        }, v.offset = {
            bodyOffset: function(e) {
                var t = e.offsetTop,
                    n = e.offsetLeft;
                return v.support.doesNotIncludeMarginInBodyOffset && (t += parseFloat(v.css(e, "marginTop")) || 0, n += parseFloat(v.css(e, "marginLeft")) || 0), {
                    top: t,
                    left: n
                }
            },
            setOffset: function(e, t, n) {
                var r = v.css(e, "position");
                "static" === r && (e.style.position = "relative");
                var c, h, i = v(e),
                    s = i.offset(),
                    o = v.css(e, "top"),
                    u = v.css(e, "left"),
                    a = ("absolute" === r || "fixed" === r) && v.inArray("auto", [o, u]) > -1,
                    f = {},
                    l = {};
                a ? (l = i.position(), c = l.top, h = l.left) : (c = parseFloat(o) || 0, h = parseFloat(u) || 0), v.isFunction(t) && (t = t.call(e, n, s)), null != t.top && (f.top = t.top - s.top + c), null != t.left && (f.left = t.left - s.left + h), "using" in t ? t.using.call(e, f) : i.css(f)
            }
        }, v.fn.extend({
            position: function() {
                if (this[0]) {
                    var e = this[0],
                        t = this.offsetParent(),
                        n = this.offset(),
                        r = er.test(t[0].nodeName) ? {
                            top: 0,
                            left: 0
                        } : t.offset();
                    return n.top -= parseFloat(v.css(e, "marginTop")) || 0, n.left -= parseFloat(v.css(e, "marginLeft")) || 0, r.top += parseFloat(v.css(t[0], "borderTopWidth")) || 0, r.left += parseFloat(v.css(t[0], "borderLeftWidth")) || 0, {
                        top: n.top - r.top,
                        left: n.left - r.left
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var e = this.offsetParent || i.body; e && !er.test(e.nodeName) && "static" === v.css(e, "position");) e = e.offsetParent;
                    return e || i.body
                })
            }
        }), v.each({
            scrollLeft: "pageXOffset",
            scrollTop: "pageYOffset"
        }, function(e, n) {
            var r = /Y/.test(n);
            v.fn[e] = function(i) {
                return v.access(this, function(e, i, s) {
                    var o = tr(e);
                    return s === t ? o ? n in o ? o[n] : o.document.documentElement[i] : e[i] : void(o ? o.scrollTo(r ? v(o).scrollLeft() : s, r ? s : v(o).scrollTop()) : e[i] = s)
                }, e, i, arguments.length, null)
            }
        }), v.each({
            Height: "height",
            Width: "width"
        }, function(e, n) {
            v.each({
                padding: "inner" + e,
                content: n,
                "": "outer" + e
            }, function(r, i) {
                v.fn[i] = function(i, s) {
                    var o = arguments.length && (r || "boolean" != typeof i),
                        u = r || (i === !0 || s === !0 ? "margin" : "border");
                    return v.access(this, function(n, r, i) {
                        var s;
                        return v.isWindow(n) ? n.document.documentElement["client" + e] : 9 === n.nodeType ? (s = n.documentElement, Math.max(n.body["scroll" + e], s["scroll" + e], n.body["offset" + e], s["offset" + e], s["client" + e])) : i === t ? v.css(n, r, i, u) : v.style(n, r, i, u)
                    }, n, o ? i : t, o, null)
                }
            })
        }), e.jQuery = e.$ = v, "function" == typeof define && define.amd && define.amd.jQuery && define("jquery", [], function() {
            return v
        })
    }(window),
    function(T, aa, p) {
        "use strict";

        function m(b, a, c) {
            var d;
            if (b)
                if (M(b))
                    for (d in b) "prototype" != d && "length" != d && "name" != d && b.hasOwnProperty(d) && a.call(c, b[d], d);
                else if (b.forEach && b.forEach !== m) b.forEach(a, c);
            else if (J(b) && va(b.length))
                for (d = 0; d < b.length; d++) a.call(c, b[d], d);
            else
                for (d in b) b.hasOwnProperty(d) && a.call(c, b[d], d);
            return b
        }

        function kb(b) {
            var c, a = [];
            for (c in b) b.hasOwnProperty(c) && a.push(c);
            return a.sort()
        }

        function dc(b, a, c) {
            for (var d = kb(b), e = 0; e < d.length; e++) a.call(c, b[d[e]], d[e]);
            return d
        }

        function lb(b) {
            return function(a, c) {
                b(c, a)
            }
        }

        function wa() {
            for (var a, b = Y.length; b;) {
                if (b--, a = Y[b].charCodeAt(0), 57 == a) return Y[b] = "A", Y.join("");
                if (90 != a) return Y[b] = String.fromCharCode(a + 1), Y.join("");
                Y[b] = "0"
            }
            return Y.unshift("0"), Y.join("")
        }

        function D(b) {
            return m(arguments, function(a) {
                a !== b && m(a, function(a, d) {
                    b[d] = a
                })
            }), b
        }

        function H(b) {
            return parseInt(b, 10)
        }

        function xa(b, a) {
            return D(new(D(function() {}, {
                prototype: b
            })), a)
        }

        function x() {}

        function ya(b) {
            return b
        }

        function B(b) {
            return function() {
                return b
            }
        }

        function v(b) {
            return "undefined" == typeof b
        }

        function s(b) {
            return "undefined" != typeof b
        }

        function J(b) {
            return null != b && "object" == typeof b
        }

        function G(b) {
            return "string" == typeof b
        }

        function va(b) {
            return "number" == typeof b
        }

        function ma(b) {
            return "[object Date]" == Sa.apply(b)
        }

        function K(b) {
            return "[object Array]" == Sa.apply(b)
        }

        function M(b) {
            return "function" == typeof b
        }

        function na(b) {
            return b && b.document && b.location && b.alert && b.setInterval
        }

        function Q(b) {
            return G(b) ? b.replace(/^\s*/, "").replace(/\s*$/, "") : b
        }

        function ec(b) {
            return b && (b.nodeName || b.bind && b.find)
        }

        function Ta(b, a, c) {
            var d = [];
            return m(b, function(b, g, h) {
                d.push(a.call(c, b, g, h))
            }), d
        }

        function fc(b, a) {
            var d, c = 0;
            if (K(b) || G(b)) return b.length;
            if (J(b))
                for (d in b)(!a || b.hasOwnProperty(d)) && c++;
            return c
        }

        function Ua(b, a) {
            if (b.indexOf) return b.indexOf(a);
            for (var c = 0; c < b.length; c++)
                if (a === b[c]) return c;
            return -1
        }

        function za(b, a) {
            var c = Ua(b, a);
            return c >= 0 && b.splice(c, 1), a
        }

        function U(b, a) {
            if (na(b) || b && b.$evalAsync && b.$watch) throw z("Can't copy Window or Scope");
            if (a) {
                if (b === a) throw z("Can't copy equivalent objects or arrays");
                if (K(b)) {
                    for (; a.length;) a.pop();
                    for (var c = 0; c < b.length; c++) a.push(U(b[c]))
                } else
                    for (c in m(a, function(b, c) {
                            delete a[c]
                        }), b) a[c] = U(b[c])
            } else(a = b) && (K(b) ? a = U(b, []) : ma(b) ? a = new Date(b.getTime()) : J(b) && (a = U(b, {})));
            return a
        }

        function gc(b, a) {
            var c, a = a || {};
            for (c in b) b.hasOwnProperty(c) && "$$" !== c.substr(0, 2) && (a[c] = b[c]);
            return a
        }

        function fa(b, a) {
            if (b === a) return !0;
            if (null === b || null === a) return !1;
            if (b !== b && a !== a) return !0;
            var d, c = typeof b;
            if (c == typeof a && "object" == c) {
                if (!K(b)) {
                    if (ma(b)) return ma(a) && b.getTime() == a.getTime();
                    if (b && b.$evalAsync && b.$watch || a && a.$evalAsync && a.$watch || na(b) || na(a)) return !1;
                    c = {};
                    for (d in b) {
                        if ("$" !== d.charAt(0) && !M(b[d]) && !fa(b[d], a[d])) return !1;
                        c[d] = !0
                    }
                    for (d in a)
                        if (!c[d] && "$" !== d.charAt(0) && !M(a[d])) return !1;
                    return !0
                }
                if ((c = b.length) == a.length) {
                    for (d = 0; c > d; d++)
                        if (!fa(b[d], a[d])) return !1;
                    return !0
                }
            }
            return !1
        }

        function Va(b, a) {
            var c = arguments.length > 2 ? ga.call(arguments, 2) : [];
            return !M(a) || a instanceof RegExp ? a : c.length ? function() {
                return arguments.length ? a.apply(b, c.concat(ga.call(arguments, 0))) : a.apply(b, c)
            } : function() {
                return arguments.length ? a.apply(b, arguments) : a.call(b)
            }
        }

        function hc(b, a) {
            var c = a;
            return /^\$+/.test(b) ? c = p : na(a) ? c = "$WINDOW" : a && aa === a ? c = "$DOCUMENT" : a && a.$evalAsync && a.$watch && (c = "$SCOPE"), c
        }

        function ba(b, a) {
            return JSON.stringify(b, hc, a ? "  " : null)
        }

        function mb(b) {
            return G(b) ? JSON.parse(b) : b
        }

        function Wa(b) {
            return b && 0 !== b.length ? (b = C("" + b), b = !("f" == b || "0" == b || "false" == b || "no" == b || "n" == b || "[]" == b)) : b = !1, b
        }

        function oa(b) {
            b = u(b).clone();
            try {
                b.html("")
            } catch (a) {}
            return u("<div>").append(b).html().match(/^(<[^>]+>)/)[1].replace(/^<([\w\-]+)/, function(a, b) {
                return "<" + C(b)
            })
        }

        function Xa(b) {
            var c, d, a = {};
            return m((b || "").split("&"), function(b) {
                b && (c = b.split("="), d = decodeURIComponent(c[0]), a[d] = s(c[1]) ? decodeURIComponent(c[1]) : !0)
            }), a
        }

        function nb(b) {
            var a = [];
            return m(b, function(b, d) {
                a.push(Ya(d, !0) + (b === !0 ? "" : "=" + Ya(b, !0)))
            }), a.length ? a.join("&") : ""
        }

        function Za(b) {
            return Ya(b, !0).replace(/%26/gi, "&").replace(/%3D/gi, "=").replace(/%2B/gi, "+")
        }

        function Ya(b, a) {
            return encodeURIComponent(b).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(a ? null : /%20/g, "+")
        }

        function ic(b, a) {
            function c(a) {
                a && d.push(a)
            }
            var e, g, d = [b],
                h = ["ng:app", "ng-app", "x-ng-app", "data-ng-app"],
                f = /\sng[:\-]app(:\s*([\w\d_]+);?)?\s/;
            m(h, function(a) {
                h[a] = !0, c(aa.getElementById(a)), a = a.replace(":", "\\:"), b.querySelectorAll && (m(b.querySelectorAll("." + a), c), m(b.querySelectorAll("." + a + "\\:"), c), m(b.querySelectorAll("[" + a + "]"), c))
            }), m(d, function(a) {
                if (!e) {
                    var b = f.exec(" " + a.className + " ");
                    b ? (e = a, g = (b[2] || "").replace(/\s+/g, ",")) : m(a.attributes, function(b) {
                        !e && h[b.name] && (e = a, g = b.value)
                    })
                }
            }), e && a(e, g ? [g] : [])
        }

        function ob(b, a) {
            b = u(b), a = a || [], a.unshift(["$provide", function(a) {
                a.value("$rootElement", b)
            }]), a.unshift("ng");
            var c = pb(a);
            return c.invoke(["$rootScope", "$rootElement", "$compile", "$injector", function(a, b, c, h) {
                a.$apply(function() {
                    b.data("$injector", h), c(b)(a)
                })
            }]), c
        }

        function $a(b, a) {
            return a = a || "_", b.replace(jc, function(b, d) {
                return (d ? a : "") + b.toLowerCase()
            })
        }

        function pa(b, a, c) {
            if (!b) throw new z("Argument '" + (a || "?") + "' is " + (c || "required"));
            return b
        }

        function qa(b, a, c) {
            return c && K(b) && (b = b[b.length - 1]), pa(M(b), a, "not a function, got " + (b && "object" == typeof b ? b.constructor.name || "Object" : typeof b)), b
        }

        function kc(b) {
            function a(a, b, e) {
                return a[b] || (a[b] = e())
            }
            return a(a(b, "angular", Object), "module", function() {
                var b = {};
                return function(d, e, g) {
                    return e && b.hasOwnProperty(d) && (b[d] = null), a(b, d, function() {
                        function a(c, d, e) {
                            return function() {
                                return b[e || "push"]([c, d, arguments]), k
                            }
                        }
                        if (!e) throw z("No module: " + d);
                        var b = [],
                            c = [],
                            j = a("$injector", "invoke"),
                            k = {
                                _invokeQueue: b,
                                _runBlocks: c,
                                requires: e,
                                name: d,
                                provider: a("$provide", "provider"),
                                factory: a("$provide", "factory"),
                                service: a("$provide", "service"),
                                value: a("$provide", "value"),
                                constant: a("$provide", "constant", "unshift"),
                                filter: a("$filterProvider", "register"),
                                controller: a("$controllerProvider", "register"),
                                directive: a("$compileProvider", "directive"),
                                config: j,
                                run: function(a) {
                                    return c.push(a), this
                                }
                            };
                        return g && j(g), k
                    })
                }
            })
        }

        function qb(b) {
            return b.replace(lc, function(a, b, d, e) {
                return e ? d.toUpperCase() : d
            }).replace(mc, "Moz$1")
        }

        function ab(b, a) {
            function c() {
                for (var e, h, f, i, j, k, l, n, b = [this], c = a; b.length;)
                    for (h = b.shift(), f = 0, i = h.length; i > f; f++)
                        for (j = u(h[f]), c ? (n = (k = j.data("events")) && k.$destroy) && m(n, function(a) {
                                a.handler()
                            }) : c = !c, k = 0, e = (l = j.children()).length, j = e; j > k; k++) b.push(ha(l[k]));
                return d.apply(this, arguments)
            }
            var d = ha.fn[b],
                d = d.$original || d;
            c.$original = d, ha.fn[b] = c
        }

        function P(b) {
            if (b instanceof P) return b;
            if (!(this instanceof P)) {
                if (G(b) && "<" != b.charAt(0)) throw z("selectors not implemented");
                return new P(b)
            }
            if (G(b)) {
                var a = aa.createElement("div");
                a.innerHTML = "<div>&nbsp;</div>" + b, a.removeChild(a.firstChild), bb(this, a.childNodes), this.remove()
            } else bb(this, b)
        }

        function cb(b) {
            return b.cloneNode(!0)
        }

        function ra(b) {
            rb(b);
            for (var a = 0, b = b.childNodes || []; a < b.length; a++) ra(b[a])
        }

        function sb(b, a, c) {
            var d = ca(b, "events");
            ca(b, "handle") && (v(a) ? m(d, function(a, c) {
                tb(b, c, a), delete d[c]
            }) : v(c) ? (tb(b, a, d[a]), delete d[a]) : za(d[a], c))
        }

        function rb(b) {
            var a = b[Aa],
                c = Ba[a];
            c && (c.handle && (c.events.$destroy && c.handle({}, "$destroy"), sb(b)), delete Ba[a], b[Aa] = p)
        }

        function ca(b, a, c) {
            var d = b[Aa],
                d = Ba[d || -1];
            return s(c) ? (d || (b[Aa] = d = ++nc, d = Ba[d] = {}), void(d[a] = c)) : d && d[a]
        }

        function ub(b, a, c) {
            var d = ca(b, "data"),
                e = s(c),
                g = !e && s(a),
                h = g && !J(a);
            if (!d && !h && ca(b, "data", d = {}), e) d[a] = c;
            else {
                if (!g) return d;
                if (h) return d && d[a];
                D(d, a)
            }
        }

        function Ca(b, a) {
            return (" " + b.className + " ").replace(/[\n\t]/g, " ").indexOf(" " + a + " ") > -1
        }

        function vb(b, a) {
            a && m(a.split(" "), function(a) {
                b.className = Q((" " + b.className + " ").replace(/[\n\t]/g, " ").replace(" " + Q(a) + " ", " "))
            })
        }

        function wb(b, a) {
            a && m(a.split(" "), function(a) {
                Ca(b, a) || (b.className = Q(b.className + " " + Q(a)))
            })
        }

        function bb(b, a) {
            if (a)
                for (var a = a.nodeName || !s(a.length) || na(a) ? [a] : a, c = 0; c < a.length; c++) b.push(a[c])
        }

        function xb(b, a) {
            return Da(b, "$" + (a || "ngController") + "Controller")
        }

        function Da(b, a, c) {
            for (b = u(b), 9 == b[0].nodeType && (b = b.find("html")); b.length;) {
                if (c = b.data(a)) return c;
                b = b.parent()
            }
        }

        function yb(b, a) {
            var c = Ea[a.toLowerCase()];
            return c && zb[b.nodeName] && c
        }

        function oc(b, a) {
            var c = function(c, e) {
                if (c.preventDefault || (c.preventDefault = function() {
                        c.returnValue = !1
                    }), c.stopPropagation || (c.stopPropagation = function() {
                        c.cancelBubble = !0
                    }), c.target || (c.target = c.srcElement || aa), v(c.defaultPrevented)) {
                    var g = c.preventDefault;
                    c.preventDefault = function() {
                        c.defaultPrevented = !0, g.call(c)
                    }, c.defaultPrevented = !1
                }
                c.isDefaultPrevented = function() {
                    return c.defaultPrevented
                }, m(a[e || c.type], function(a) {
                    a.call(b, c)
                }), 8 >= Z ? (c.preventDefault = null, c.stopPropagation = null, c.isDefaultPrevented = null) : (delete c.preventDefault, delete c.stopPropagation, delete c.isDefaultPrevented)
            };
            return c.elem = b, c
        }

        function ia(b) {
            var c, a = typeof b;
            return "object" == a && null !== b ? "function" == typeof(c = b.$$hashKey) ? c = b.$$hashKey() : c === p && (c = b.$$hashKey = wa()) : c = b, a + ":" + c
        }

        function Fa(b) {
            m(b, this.put, this)
        }

        function db() {}

        function Ab(b) {
            var a, c;
            return "function" == typeof b ? (a = b.$inject) || (a = [], c = b.toString().replace(pc, ""), c = c.match(qc), m(c[1].split(rc), function(b) {
                b.replace(sc, function(b, c, d) {
                    a.push(d)
                })
            }), b.$inject = a) : K(b) ? (c = b.length - 1, qa(b[c], "fn"), a = b.slice(0, c)) : qa(b, "fn", !0), a
        }

        function pb(b) {
            function a(a) {
                return function(b, c) {
                    return J(b) ? void m(b, lb(a)) : a(b, c)
                }
            }

            function c(a, b) {
                if (M(b) && (b = l.instantiate(b)), !b.$get) throw z("Provider " + a + " must define $get factory method.");
                return k[a + f] = b
            }

            function d(a, b) {
                return c(a, {
                    $get: b
                })
            }

            function e(a) {
                var b = [];
                return m(a, function(a) {
                    if (!j.get(a))
                        if (j.put(a, !0), G(a)) {
                            var c = sa(a);
                            b = b.concat(e(c.requires)).concat(c._runBlocks);
                            try {
                                for (var d = c._invokeQueue, c = 0, f = d.length; f > c; c++) {
                                    var g = d[c],
                                        i = "$injector" == g[0] ? l : l.get(g[0]);
                                    i[g[1]].apply(i, g[2])
                                }
                            } catch (h) {
                                throw h.message && (h.message += " from " + a), h
                            }
                        } else if (M(a)) try {
                        b.push(l.invoke(a))
                    } catch (o) {
                        throw o.message && (o.message += " from " + a), o
                    } else if (K(a)) try {
                        b.push(l.invoke(a))
                    } catch (n) {
                        throw n.message && (n.message += " from " + String(a[a.length - 1])), n
                    } else qa(a, "module")
                }), b
            }

            function g(a, b) {
                function c(d) {
                    if ("string" != typeof d) throw z("Service name expected");
                    if (a.hasOwnProperty(d)) {
                        if (a[d] === h) throw z("Circular dependency: " + i.join(" <- "));
                        return a[d]
                    }
                    try {
                        return i.unshift(d), a[d] = h, a[d] = b(d)
                    } finally {
                        i.shift()
                    }
                }

                function d(a, b, e) {
                    var j, h, o, f = [],
                        g = Ab(a);
                    for (h = 0, j = g.length; j > h; h++) o = g[h], f.push(e && e.hasOwnProperty(o) ? e[o] : c(o, i));
                    switch (a.$inject || (a = a[j]), b ? -1 : f.length) {
                        case 0:
                            return a();
                        case 1:
                            return a(f[0]);
                        case 2:
                            return a(f[0], f[1]);
                        case 3:
                            return a(f[0], f[1], f[2]);
                        case 4:
                            return a(f[0], f[1], f[2], f[3]);
                        case 5:
                            return a(f[0], f[1], f[2], f[3], f[4]);
                        case 6:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5]);
                        case 7:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6]);
                        case 8:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6], f[7]);
                        case 9:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6], f[7], f[8]);
                        case 10:
                            return a(f[0], f[1], f[2], f[3], f[4], f[5], f[6], f[7], f[8], f[9]);
                        default:
                            return a.apply(b, f)
                    }
                }
                return {
                    invoke: d,
                    instantiate: function(a, b) {
                        var e, c = function() {};
                        return c.prototype = (K(a) ? a[a.length - 1] : a).prototype, c = new c, e = d(a, c, b), J(e) ? e : c
                    },
                    get: c,
                    annotate: Ab
                }
            }
            var h = {},
                f = "Provider",
                i = [],
                j = new Fa,
                k = {
                    $provide: {
                        provider: a(c),
                        factory: a(d),
                        service: a(function(a, b) {
                            return d(a, ["$injector", function(a) {
                                return a.instantiate(b)
                            }])
                        }),
                        value: a(function(a, b) {
                            return d(a, B(b))
                        }),
                        constant: a(function(a, b) {
                            k[a] = b, n[a] = b
                        }),
                        decorator: function(a, b) {
                            var c = l.get(a + f),
                                d = c.$get;
                            c.$get = function() {
                                var a = r.invoke(d, c);
                                return r.invoke(b, null, {
                                    $delegate: a
                                })
                            }
                        }
                    }
                },
                l = g(k, function() {
                    throw z("Unknown provider: " + i.join(" <- "))
                }),
                n = {},
                r = n.$injector = g(n, function(a) {
                    return a = l.get(a + f), r.invoke(a.$get, a)
                });
            return m(e(b), function(a) {
                r.invoke(a || x)
            }), r
        }

        function tc() {
            var b = !0;
            this.disableAutoScrolling = function() {
                b = !1
            }, this.$get = ["$window", "$location", "$rootScope", function(a, c, d) {
                function e(a) {
                    var b = null;
                    return m(a, function(a) {
                        !b && "a" === C(a.nodeName) && (b = a)
                    }), b
                }

                function g() {
                    var d, b = c.hash();
                    b ? (d = h.getElementById(b)) ? d.scrollIntoView() : (d = e(h.getElementsByName(b))) ? d.scrollIntoView() : "top" === b && a.scrollTo(0, 0) : a.scrollTo(0, 0)
                }
                var h = a.document;
                return b && d.$watch(function() {
                    return c.hash()
                }, function() {
                    d.$evalAsync(g)
                }), g
            }]
        }

        function uc(b, a, c, d) {
            function e(a) {
                try {
                    a.apply(null, ga.call(arguments, 1))
                } finally {
                    if (o--, 0 === o)
                        for (; w.length;) try {
                            w.pop()()
                        } catch (b) {
                            c.error(b)
                        }
                }
            }

            function g(a, b) {
                ! function da() {
                    m(q, function(a) {
                        a()
                    }), t = b(da, a)
                }()
            }

            function h() {
                X != f.url() && (X = f.url(), m(y, function(a) {
                    a(f.url())
                }))
            }
            var f = this,
                i = a[0],
                j = b.location,
                k = b.history,
                l = b.setTimeout,
                n = b.clearTimeout,
                r = {};
            f.isMock = !1;
            var o = 0,
                w = [];
            f.$$completeOutstandingRequest = e, f.$$incOutstandingRequestCount = function() {
                o++
            }, f.notifyWhenNoOutstandingRequests = function(a) {
                m(q, function(a) {
                    a()
                }), 0 === o ? a() : w.push(a)
            };
            var t, q = [];
            f.addPollFn = function(a) {
                return v(t) && g(100, l), q.push(a), a
            };
            var X = j.href,
                A = a.find("base");
            f.url = function(a, b) {
                return a ? X != a ? (X = a, d.history ? b ? k.replaceState(null, "", a) : (k.pushState(null, "", a), A.attr("href", A.attr("href"))) : b ? j.replace(a) : j.href = a, f) : void 0 : j.href.replace(/%27/g, "'")
            };
            var y = [],
                L = !1;
            f.onUrlChange = function(a) {
                return L || (d.history && u(b).bind("popstate", h), d.hashchange ? u(b).bind("hashchange", h) : f.addPollFn(h), L = !0), y.push(a), a
            }, f.baseHref = function() {
                var a = A.attr("href");
                return a ? a.replace(/^https?\:\/\/[^\/]*/, "") : a
            };
            var V = {},
                I = "",
                N = f.baseHref();
            f.cookies = function(a, b) {
                var d, e, f, g;
                if (!a) {
                    if (i.cookie !== I)
                        for (I = i.cookie, d = I.split("; "), V = {}, f = 0; f < d.length; f++) e = d[f], g = e.indexOf("="), g > 0 && (V[unescape(e.substring(0, g))] = unescape(e.substring(g + 1)));
                    return V
                }
                b === p ? i.cookie = escape(a) + "=;path=" + N + ";expires=Thu, 01 Jan 1970 00:00:00 GMT" : G(b) && (d = (i.cookie = escape(a) + "=" + escape(b) + ";path=" + N).length + 1, d > 4096 && c.warn("Cookie '" + a + "' possibly not set or overflowed because it was too large (" + d + " > 4096 bytes)!"), V.length > 20 && c.warn("Cookie '" + a + "' possibly not set or overflowed because too many cookies were already set (" + V.length + " > 20 )"))
            }, f.defer = function(a, b) {
                var c;
                return o++, c = l(function() {
                    delete r[c], e(a)
                }, b || 0), r[c] = !0, c
            }, f.defer.cancel = function(a) {
                return r[a] ? (delete r[a], n(a), e(x), !0) : !1
            }
        }

        function vc() {
            this.$get = ["$window", "$log", "$sniffer", "$document", function(b, a, c, d) {
                return new uc(b, d, a, c)
            }]
        }

        function wc() {
            this.$get = function() {
                function b(b, d) {
                    function e(a) {
                        a != l && (n ? n == a && (n = a.n) : n = a, g(a.n, a.p), g(a, l), l = a, l.n = null)
                    }

                    function g(a, b) {
                        a != b && (a && (a.p = b), b && (b.n = a))
                    }
                    if (b in a) throw z("cacheId " + b + " taken");
                    var h = 0,
                        f = D({}, d, {
                            id: b
                        }),
                        i = {},
                        j = d && d.capacity || Number.MAX_VALUE,
                        k = {},
                        l = null,
                        n = null;
                    return a[b] = {
                        put: function(a, b) {
                            var c = k[a] || (k[a] = {
                                key: a
                            });
                            e(c), v(b) || (a in i || h++, i[a] = b, h > j && this.remove(n.key))
                        },
                        get: function(a) {
                            var b = k[a];
                            return b ? (e(b), i[a]) : void 0
                        },
                        remove: function(a) {
                            var b = k[a];
                            b == l && (l = b.p), b == n && (n = b.n), g(b.n, b.p), delete k[a], delete i[a], h--
                        },
                        removeAll: function() {
                            i = {}, h = 0, k = {}, l = n = null
                        },
                        destroy: function() {
                            k = f = i = null, delete a[b]
                        },
                        info: function() {
                            return D({}, f, {
                                size: h
                            })
                        }
                    }
                }
                var a = {};
                return b.info = function() {
                    var b = {};
                    return m(a, function(a, e) {
                        b[e] = a.info()
                    }), b
                }, b.get = function(b) {
                    return a[b]
                }, b
            }
        }

        function xc() {
            this.$get = ["$cacheFactory", function(b) {
                return b("templates")
            }]
        }

        function Bb(b) {
            var a = {},
                c = "Directive",
                d = /^\s*directive\:\s*([\d\w\-_]+)\s+(.*)$/,
                e = /(([\d\w\-_]+)(?:\:([^;]+))?;?)/,
                g = "Template must have exactly one root element. was: ";
            this.directive = function f(d, e) {
                return G(d) ? (pa(e, "directive"), a.hasOwnProperty(d) || (a[d] = [], b.factory(d + c, ["$injector", "$exceptionHandler", function(b, c) {
                    var e = [];
                    return m(a[d], function(a) {
                        try {
                            var f = b.invoke(a);
                            M(f) ? f = {
                                compile: B(f)
                            } : !f.compile && f.link && (f.compile = B(f.link)), f.priority = f.priority || 0, f.name = f.name || d, f.require = f.require || f.controller && f.name, f.restrict = f.restrict || "A", e.push(f)
                        } catch (g) {
                            c(g)
                        }
                    }), e
                }])), a[d].push(e)) : m(d, lb(f)), this
            }, this.$get = ["$injector", "$interpolate", "$exceptionHandler", "$http", "$templateCache", "$parse", "$controller", "$rootScope", function(b, i, j, k, l, n, r, o) {
                function w(a, b, c) {
                    a instanceof u || (a = u(a)), m(a, function(b, c) {
                        3 == b.nodeType && (a[c] = u(b).wrap("<span>").parent()[0])
                    });
                    var d = t(a, b, a, c);
                    return function(b, c) {
                        pa(b, "scope");
                        var e = c ? ta.clone.call(a) : a;
                        return e.data("$scope", b), q(e, "ng-scope"), c && c(e, b), d && d(b, e, e), e
                    }
                }

                function q(a, b) {
                    try {
                        a.addClass(b)
                    } catch (c) {}
                }

                function t(a, b, c, d) {
                    function e(a, c, d, g) {
                        for (var j, i, n, k, l, o = 0, r = 0, q = f.length; q > o; r++) n = c[r], j = f[o++], i = f[o++], j ? (j.scope ? (k = a.$new(J(j.scope)), u(n).data("$scope", k)) : k = a, (l = j.transclude) || !g && b ? j(i, k, n, d, function(b) {
                            return function(c) {
                                var d = a.$new();
                                return b(d, c).bind("$destroy", Va(d, d.$destroy))
                            }
                        }(l || b)) : j(i, k, n, p, g)) : i && i(a, n.childNodes, p, g)
                    }
                    for (var g, j, i, f = [], n = 0; n < a.length; n++) j = new da, g = X(a[n], [], j, d), j = (g = g.length ? A(g, a[n], j, b, c) : null) && g.terminal ? null : t(a[n].childNodes, g ? g.transclude : b), f.push(g), f.push(j), i = i || g || j;
                    return i ? e : null
                }

                function X(a, b, c, f) {
                    var j, g = c.$attr;
                    switch (a.nodeType) {
                        case 1:
                            y(b, ea(Cb(a).toLowerCase()), "E", f);
                            var i, n, k;
                            j = a.attributes;
                            for (var l = 0, o = j && j.length; o > l; l++) i = j[l], i.specified && (n = i.name, k = ea(n.toLowerCase()), g[k] = n, c[k] = i = Q(Z && "href" == n ? decodeURIComponent(a.getAttribute(n, 2)) : i.value), yb(a, k) && (c[k] = !0), W(a, b, i, k), y(b, k, "A", f));
                            if (a = a.className, G(a))
                                for (; j = e.exec(a);) k = ea(j[2]), y(b, k, "C", f) && (c[k] = Q(j[3])), a = a.substr(j.index + j[0].length);
                            break;
                        case 3:
                            F(b, a.nodeValue);
                            break;
                        case 8:
                            try {
                                (j = d.exec(a.nodeValue)) && (k = ea(j[1]), y(b, k, "M", f) && (c[k] = Q(j[2])))
                            } catch (r) {}
                    }
                    return b.sort(I), b
                }

                function A(a, b, c, d, e) {
                    function f(a, b) {
                        a && (a.require = E.require, o.push(a)), b && (b.require = E.require, t.push(b))
                    }

                    function i(a, b) {
                        var c, d = "data",
                            e = !1;
                        if (G(a)) {
                            for (;
                                "^" == (c = a.charAt(0)) || "?" == c;) a = a.substr(1), "^" == c && (d = "inheritedData"), e = e || "?" == c;
                            if (c = b[d]("$" + a + "Controller"), !c && !e) throw z("No controller: " + a)
                        } else K(a) && (c = [], m(a, function(a) {
                            c.push(i(a, b))
                        }));
                        return c
                    }

                    function k(a, d, e, f, g) {
                        var l, q, w, L, Ha;
                        if (l = b === e ? c : gc(c, new da(u(e), c.$attr)), q = l.$$element, A && J(A.scope)) {
                            var yc = /^\s*([@=&])\s*(\w*)\s*$/,
                                ja = d.$parent || d;
                            m(A.scope, function(a, b) {
                                var f, g, j, c = a.match(yc) || [],
                                    e = c[2] || b;
                                switch (c[1]) {
                                    case "@":
                                        l.$observe(e, function(a) {
                                            d[b] = a
                                        }), l.$$observers[e].$$scope = ja;
                                        break;
                                    case "=":
                                        g = n(l[e]), j = g.assign || function() {
                                            throw f = d[b] = g(ja), z(Db + l[e] + " (directive: " + A.name + ")")
                                        }, f = d[b] = g(ja), d.$watch(function() {
                                            var a = g(ja);
                                            return a !== d[b] && (a !== f ? f = d[b] = a : j(ja, f = d[b])), a
                                        });
                                        break;
                                    case "&":
                                        g = n(l[e]), d[b] = function(a) {
                                            return g(ja, a)
                                        };
                                        break;
                                    default:
                                        throw z("Invalid isolate scope definition for directive " + A.name + ": " + a)
                                }
                            })
                        }
                        for (s && m(s, function(a) {
                                var b = {
                                    $scope: d,
                                    $element: q,
                                    $attrs: l,
                                    $transclude: g
                                };
                                Ha = a.controller, "@" == Ha && (Ha = l[a.name]), q.data("$" + a.name + "Controller", r(Ha, b))
                            }), f = 0, w = o.length; w > f; f++) try {
                            (L = o[f])(d, q, l, L.require && i(L.require, q))
                        } catch (y) {
                            j(y, oa(q))
                        }
                        for (a && a(d, e.childNodes, p, g), f = 0, w = t.length; w > f; f++) try {
                            (L = t[f])(d, q, l, L.require && i(L.require, q))
                        } catch (X) {
                            j(X, oa(q))
                        }
                    }
                    for (var E, W, $, x, s, D, B, l = -Number.MAX_VALUE, o = [], t = [], A = null, y = null, I = null, F = c.$$element = u(b), v = d, C = 0, H = a.length; H > C && (E = a[C], $ = p, !(l > E.priority)); C++) {
                        if ((B = E.scope) && (N("isolated scope", y, E, F), J(B) && (q(F, "ng-isolate-scope"), y = E), q(F, "ng-scope"), A = A || E), W = E.name, (B = E.controller) && (s = s || {}, N("'" + W + "' controller", s[W], E, F), s[W] = E), (B = E.transclude) && (N("transclusion", x, E, F), x = E, l = E.priority, "element" == B ? ($ = u(b), F = c.$$element = u("<!-- " + W + ": " + c[W] + " -->"), b = F[0], Ga(e, u($[0]), b), v = w($, d, l)) : ($ = u(cb(b)).contents(), F.html(""), v = w($, d))), B = E.template)
                            if (N("template", I, E, F), I = E, $ = u("<div>" + Q(B) + "</div>").contents(), b = $[0], E.replace) {
                                if (1 != $.length || 1 !== b.nodeType) throw new z(g + B);
                                Ga(e, F, b), W = {
                                    $attr: {}
                                }, a = a.concat(X(b, a.splice(C + 1, a.length - (C + 1)), W)), L(c, W), H = a.length
                            } else F.html(B);
                        if (E.templateUrl) N("template", I, E, F), I = E, k = V(a.splice(C, a.length - C), k, F, c, e, E.replace, v), H = a.length;
                        else if (E.compile) try {
                            D = E.compile(F, c, v), M(D) ? f(null, D) : D && f(D.pre, D.post)
                        } catch (O) {
                            j(O, oa(F))
                        }
                        E.terminal && (k.terminal = !0, l = Math.max(l, E.priority))
                    }
                    return k.scope = A && A.scope, k.transclude = x && v, k
                }

                function y(d, e, g, i) {
                    var n = !1;
                    if (a.hasOwnProperty(e))
                        for (var k, e = b.get(e + c), l = 0, o = e.length; o > l; l++) try {
                            k = e[l], (i === p || i > k.priority) && -1 != k.restrict.indexOf(g) && (d.push(k), n = !0)
                        } catch (r) {
                            j(r)
                        }
                    return n
                }

                function L(a, b) {
                    var c = b.$attr,
                        d = a.$attr,
                        e = a.$$element;
                    m(a, function(d, e) {
                        "$" != e.charAt(0) && (b[e] && (d += ("style" === e ? ";" : " ") + b[e]), a.$set(e, d, !0, c[e]))
                    }), m(b, function(b, f) {
                        "class" == f ? (q(e, b), a["class"] = (a["class"] ? a["class"] + " " : "") + b) : "style" == f ? e.attr("style", e.attr("style") + ";" + b) : "$" != f.charAt(0) && !a.hasOwnProperty(f) && (a[f] = b, d[f] = c[f])
                    })
                }

                function V(a, b, c, d, e, f, j) {
                    var n, o, i = [],
                        r = c[0],
                        q = a.shift(),
                        w = D({}, q, {
                            controller: null,
                            templateUrl: null,
                            transclude: null
                        });
                    return c.html(""), k.get(q.templateUrl, {
                            cache: l
                        }).success(function(k) {
                            var l, q;
                            if (f) {
                                if (q = u("<div>" + Q(k) + "</div>").contents(), l = q[0], 1 != q.length || 1 !== l.nodeType) throw new z(g + k);
                                k = {
                                    $attr: {}
                                }, Ga(e, c, l), X(l, a, k), L(d, k)
                            } else l = r, c.html(k);
                            for (a.unshift(w), n = A(a, c, d, j), o = t(c.contents(), j); i.length;) {
                                var m = i.pop(),
                                    k = i.pop();
                                q = i.pop();
                                var y = i.pop(),
                                    I = l;
                                q !== r && (I = cb(l), Ga(k, u(q), I)), n(function() {
                                    b(o, y, I, e, m)
                                }, y, I, e, m)
                            }
                            i = null
                        }).error(function(a, b, c, d) {
                            throw z("Failed to load template: " + d.url)
                        }),
                        function(a, c, d, e, f) {
                            i ? (i.push(c), i.push(d), i.push(e), i.push(f)) : n(function() {
                                b(o, c, d, e, f)
                            }, c, d, e, f)
                        }
                }

                function I(a, b) {
                    return b.priority - a.priority
                }

                function N(a, b, c, d) {
                    if (b) throw z("Multiple directives [" + b.name + ", " + c.name + "] asking for " + a + " on: " + oa(d))
                }

                function F(a, b) {
                    var c = i(b, !0);
                    c && a.push({
                        priority: 0,
                        compile: B(function(a, b) {
                            var d = b.parent(),
                                e = d.data("$binding") || [];
                            e.push(c), q(d.data("$binding", e), "ng-binding"), a.$watch(c, function(a) {
                                b[0].nodeValue = a
                            })
                        })
                    })
                }

                function W(a, b, c, d) {
                    var e = i(c, !0);
                    e && b.push({
                        priority: 100,
                        compile: B(function(a, b, c) {
                            b = c.$$observers || (c.$$observers = {}), "class" === d && (e = i(c[d], !0)), c[d] = p, (b[d] || (b[d] = [])).$$inter = !0, (c.$$observers && c.$$observers[d].$$scope || a).$watch(e, function(a) {
                                c.$set(d, a)
                            })
                        })
                    })
                }

                function Ga(a, b, c) {
                    var f, g, d = b[0],
                        e = d.parentNode;
                    if (a)
                        for (f = 0, g = a.length; g > f; f++)
                            if (a[f] == d) {
                                a[f] = c;
                                break
                            }
                    e && e.replaceChild(c, d), c[u.expando] = d[u.expando], b[0] = c
                }
                var da = function(a, b) {
                    this.$$element = a, this.$attr = b || {}
                };
                return da.prototype = {
                    $normalize: ea,
                    $set: function(a, b, c, d) {
                        var e = yb(this.$$element[0], a),
                            f = this.$$observers;
                        e && (this.$$element.prop(a, b), d = e), this[a] = b, d ? this.$attr[a] = d : (d = this.$attr[a]) || (this.$attr[a] = d = $a(a, "-")), c !== !1 && (null === b || b === p ? this.$$element.removeAttr(d) : this.$$element.attr(d, b)), f && m(f[a], function(a) {
                            try {
                                a(b)
                            } catch (c) {
                                j(c)
                            }
                        })
                    },
                    $observe: function(a, b) {
                        var c = this,
                            d = c.$$observers || (c.$$observers = {}),
                            e = d[a] || (d[a] = []);
                        return e.push(b), o.$evalAsync(function() {
                            e.$$inter || b(c[a])
                        }), b
                    }
                }, w
            }]
        }

        function ea(b) {
            return qb(b.replace(zc, ""))
        }

        function Ac() {
            var b = {};
            this.register = function(a, c) {
                J(a) ? D(b, a) : b[a] = c
            }, this.$get = ["$injector", "$window", function(a, c) {
                return function(d, e) {
                    if (G(d)) {
                        var g = d,
                            d = b.hasOwnProperty(g) ? b[g] : eb(e.$scope, g, !0) || eb(c, g, !0);
                        qa(d, g, !0)
                    }
                    return a.instantiate(d, e)
                }
            }]
        }

        function Bc() {
            this.$get = ["$window", function(b) {
                return u(b.document)
            }]
        }

        function Cc() {
            this.$get = ["$log", function(b) {
                return function() {
                    b.error.apply(b, arguments)
                }
            }]
        }

        function Dc() {
            var b = "{{",
                a = "}}";
            this.startSymbol = function(a) {
                return a ? (b = a, this) : b
            }, this.endSymbol = function(c) {
                return c ? (a = c, this) : b
            }, this.$get = ["$parse", function(c) {
                var d = b.length,
                    e = a.length;
                return function(g, h) {
                    for (var f, i, j = 0, k = [], l = g.length, n = !1, r = []; l > j;) - 1 != (f = g.indexOf(b, j)) && -1 != (i = g.indexOf(a, f + d)) ? (j != f && k.push(g.substring(j, f)), k.push(j = c(n = g.substring(f + d, i))), j.exp = n, j = i + e, n = !0) : (j != l && k.push(g.substring(j)), j = l);
                    return (l = k.length) || (k.push(""), l = 1), !h || n ? (r.length = l, j = function(a) {
                        for (var d, b = 0, c = l; c > b; b++) "function" == typeof(d = k[b]) && (d = d(a), null == d || d == p ? d = "" : "string" != typeof d && (d = ba(d))), r[b] = d;
                        return r.join("")
                    }, j.exp = g, j.parts = k, j) : void 0
                }
            }]
        }

        function Eb(b) {
            for (var b = b.split("/"), a = b.length; a--;) b[a] = Za(b[a]);
            return b.join("/")
        }

        function ua(b, a) {
            var c = Fb.exec(b),
                c = {
                    protocol: c[1],
                    host: c[3],
                    port: H(c[5]) || Gb[c[1]] || null,
                    path: c[6] || "/",
                    search: c[8],
                    hash: c[10]
                };
            return a && (a.$$protocol = c.protocol, a.$$host = c.host, a.$$port = c.port), c
        }

        function ka(b, a, c) {
            return b + "://" + a + (c == Gb[b] ? "" : ":" + c)
        }

        function Ec(b, a, c) {
            var d = ua(b);
            return decodeURIComponent(d.path) != a || v(d.hash) || 0 !== d.hash.indexOf(c) ? b : ka(d.protocol, d.host, d.port) + a.substr(0, a.lastIndexOf("/")) + d.hash.substr(c.length)
        }

        function Fc(b, a, c) {
            var d = ua(b);
            if (decodeURIComponent(d.path) == a) return b;
            var e = d.search && "?" + d.search || "",
                g = d.hash && "#" + d.hash || "",
                h = a.substr(0, a.lastIndexOf("/")),
                f = d.path.substr(h.length);
            if (0 !== d.path.indexOf(h)) throw z('Invalid url "' + b + '", missing path prefix "' + h + '" !');
            return ka(d.protocol, d.host, d.port) + a + "#" + c + f + e + g
        }

        function fb(b, a, c) {
            a = a || "", this.$$parse = function(b) {
                var c = ua(b, this);
                if (0 !== c.path.indexOf(a)) throw z('Invalid url "' + b + '", missing path prefix "' + a + '" !');
                this.$$path = decodeURIComponent(c.path.substr(a.length)), this.$$search = Xa(c.search), this.$$hash = c.hash && decodeURIComponent(c.hash) || "", this.$$compose()
            }, this.$$compose = function() {
                var b = nb(this.$$search),
                    c = this.$$hash ? "#" + Za(this.$$hash) : "";
                this.$$url = Eb(this.$$path) + (b ? "?" + b : "") + c, this.$$absUrl = ka(this.$$protocol, this.$$host, this.$$port) + a + this.$$url
            }, this.$$rewriteAppUrl = function(a) {
                return 0 == a.indexOf(c) ? a : void 0
            }, this.$$parse(b)
        }

        function Ia(b, a, c) {
            var d;
            this.$$parse = function(b) {
                var c = ua(b, this);
                if (c.hash && 0 !== c.hash.indexOf(a)) throw z('Invalid url "' + b + '", missing hash prefix "' + a + '" !');
                d = c.path + (c.search ? "?" + c.search : ""), c = Gc.exec((c.hash || "").substr(a.length)), this.$$path = c[1] ? ("/" == c[1].charAt(0) ? "" : "/") + decodeURIComponent(c[1]) : "", this.$$search = Xa(c[3]), this.$$hash = c[5] && decodeURIComponent(c[5]) || "", this.$$compose()
            }, this.$$compose = function() {
                var b = nb(this.$$search),
                    c = this.$$hash ? "#" + Za(this.$$hash) : "";
                this.$$url = Eb(this.$$path) + (b ? "?" + b : "") + c, this.$$absUrl = ka(this.$$protocol, this.$$host, this.$$port) + d + (this.$$url ? "#" + a + this.$$url : "")
            }, this.$$rewriteAppUrl = function(a) {
                return 0 == a.indexOf(c) ? a : void 0
            }, this.$$parse(b)
        }

        function Hb(b, a, c, d) {
            Ia.apply(this, arguments), this.$$rewriteAppUrl = function(b) {
                return 0 == b.indexOf(c) ? c + d + "#" + a + b.substr(c.length) : void 0
            }
        }

        function Ja(b) {
            return function() {
                return this[b]
            }
        }

        function Ib(b, a) {
            return function(c) {
                return v(c) ? this[b] : (this[b] = a(c), this.$$compose(), this)
            }
        }

        function Hc() {
            var b = "",
                a = !1;
            this.hashPrefix = function(a) {
                return s(a) ? (b = a, this) : b
            }, this.html5Mode = function(b) {
                return s(b) ? (a = b, this) : a
            }, this.$get = ["$rootScope", "$browser", "$sniffer", "$rootElement", function(c, d, e, g) {
                function h(a) {
                    c.$broadcast("$locationChangeSuccess", f.absUrl(), a)
                }
                var f, i, j, k = d.url(),
                    l = ua(k);
                a ? (i = d.baseHref() || "/", j = i.substr(0, i.lastIndexOf("/")), l = ka(l.protocol, l.host, l.port) + j + "/", f = e.history ? new fb(Ec(k, i, b), j, l) : new Hb(Fc(k, i, b), b, l, i.substr(j.length + 1))) : (l = ka(l.protocol, l.host, l.port) + (l.path || "") + (l.search ? "?" + l.search : "") + "#" + b + "/", f = new Ia(k, b, l)), g.bind("click", function(a) {
                    if (!a.ctrlKey && !a.metaKey && 2 != a.which) {
                        for (var b = u(a.target);
                            "a" !== C(b[0].nodeName);)
                            if (b[0] === g[0] || !(b = b.parent())[0]) return;
                        var d = b.prop("href"),
                            e = f.$$rewriteAppUrl(d);
                        d && !b.attr("target") && e && (f.$$parse(e), c.$apply(), a.preventDefault(), T.angular["ff-684208-preventDefault"] = !0)
                    }
                }), f.absUrl() != k && d.url(f.absUrl(), !0), d.onUrlChange(function(a) {
                    f.absUrl() != a && (c.$evalAsync(function() {
                        var b = f.absUrl();
                        f.$$parse(a), h(b)
                    }), c.$$phase || c.$digest())
                });
                var n = 0;
                return c.$watch(function() {
                    var a = d.url();
                    return n && a == f.absUrl() || (n++, c.$evalAsync(function() {
                        c.$broadcast("$locationChangeStart", f.absUrl(), a).defaultPrevented ? f.$$parse(a) : (d.url(f.absUrl(), f.$$replace), f.$$replace = !1, h(a))
                    })), n
                }), f
            }]
        }

        function Ic() {
            this.$get = ["$window", function(b) {
                function a(a) {
                    return a instanceof z && (a.stack ? a = a.message && -1 === a.stack.indexOf(a.message) ? "Error: " + a.message + "\n" + a.stack : a.stack : a.sourceURL && (a = a.message + "\n" + a.sourceURL + ":" + a.line)), a
                }

                function c(c) {
                    var e = b.console || {},
                        g = e[c] || e.log || x;
                    return g.apply ? function() {
                        var b = [];
                        return m(arguments, function(c) {
                            b.push(a(c))
                        }), g.apply(e, b)
                    } : function(a, b) {
                        g(a, b)
                    }
                }
                return {
                    log: c("log"),
                    warn: c("warn"),
                    info: c("info"),
                    error: c("error")
                }
            }]
        }

        function Jc(b, a) {
            function c(a) {
                return -1 != a.indexOf(q)
            }

            function d() {
                return o + 1 < b.length ? b.charAt(o + 1) : !1
            }

            function e(a) {
                return a >= "0" && "9" >= a
            }

            function g(a) {
                return " " == a || "\r" == a || "   " == a || "\n" == a || "" == a || "\xa0" == a
            }

            function h(a) {
                return a >= "a" && "z" >= a || a >= "A" && "Z" >= a || "_" == a || "$" == a
            }

            function f(a) {
                return "-" == a || "+" == a || e(a)
            }

            function i(a, c, d) {
                throw d = d || o, z("Lexer Error: " + a + " at column" + (s(c) ? "s " + c + "-" + o + " [" + b.substring(c, d) + "]" : " " + d) + " in expression [" + b + "].")
            }

            function j() {
                for (var a = "", c = o; o < b.length;) {
                    var j = C(b.charAt(o));
                    if ("." == j || e(j)) a += j;
                    else {
                        var g = d();
                        if ("e" == j && f(g)) a += j;
                        else if (f(j) && g && e(g) && "e" == a.charAt(a.length - 1)) a += j;
                        else {
                            if (!f(j) || g && e(g) || "e" != a.charAt(a.length - 1)) break;
                            i("Invalid exponent")
                        }
                    }
                    o++
                }
                a *= 1, n.push({
                    index: c,
                    text: a,
                    json: !0,
                    fn: function() {
                        return a
                    }
                })
            }

            function k() {
                for (var f, j, i, c = "", d = o; o < b.length;) {
                    var k = b.charAt(o);
                    if ("." != k && !h(k) && !e(k)) break;
                    "." == k && (f = o), c += k, o++
                }
                if (f)
                    for (j = o; j < b.length;) {
                        if (k = b.charAt(j), "(" == k) {
                            i = c.substr(f - d + 1), c = c.substr(0, f - d), o = j;
                            break
                        }
                        if (!g(k)) break;
                        j++
                    }
                if (d = {
                        index: d,
                        text: c
                    }, Ka.hasOwnProperty(c)) d.fn = d.json = Ka[c];
                else {
                    var l = Jb(c, a);
                    d.fn = D(function(a, b) {
                        return l(a, b)
                    }, {
                        assign: function(a, b) {
                            return Kb(a, c, b)
                        }
                    })
                }
                n.push(d), i && (n.push({
                    index: f,
                    text: ".",
                    json: !1
                }), n.push({
                    index: f + 1,
                    text: i,
                    json: !1
                }))
            }

            function l(a) {
                var c = o;
                o++;
                for (var d = "", f = a, e = !1; o < b.length;) {
                    var j = b.charAt(o);
                    if (f += j, e) "u" == j ? (j = b.substring(o + 1, o + 5), j.match(/[\da-f]{4}/i) || i("Invalid unicode escape [\\u" + j + "]"), o += 4, d += String.fromCharCode(parseInt(j, 16))) : (e = Kc[j], d += e ? e : j), e = !1;
                    else if ("\\" == j) e = !0;
                    else {
                        if (j == a) return o++, void n.push({
                            index: c,
                            text: f,
                            string: d,
                            json: !0,
                            fn: function() {
                                return d
                            }
                        });
                        d += j
                    }
                    o++
                }
                i("Unterminated quote", c)
            }
            for (var r, q, n = [], o = 0, w = [], t = ":"; o < b.length;) {
                if (q = b.charAt(o), c("\"'")) l(q);
                else if (e(q) || c(".") && e(d())) j();
                else if (h(q)) k(), -1 != "{,".indexOf(t) && "{" == w[0] && (r = n[n.length - 1]) && (r.json = -1 == r.text.indexOf("."));
                else if (c("(){}[].,;:")) n.push({
                    index: o,
                    text: q,
                    json: -1 != ":[,".indexOf(t) && c("{[") || c("}]:,")
                }), c("{[") && w.unshift(q), c("}]") && w.shift(), o++;
                else {
                    if (g(q)) {
                        o++;
                        continue
                    }
                    var m = q + d(),
                        A = Ka[q],
                        y = Ka[m];
                    y ? (n.push({
                        index: o,
                        text: m,
                        fn: y
                    }), o += 2) : A ? (n.push({
                        index: o,
                        text: q,
                        fn: A,
                        json: -1 != "[,:".indexOf(t) && c("+-")
                    }), o += 1) : i("Unexpected next character ", o, o + 1)
                }
                t = q
            }
            return n
        }

        function Lc(b, a, c, d) {
            function e(a, c) {
                throw z("Syntax Error: Token '" + c.text + "' " + a + " at column " + (c.index + 1) + " of the expression [" + b + "] starting at [" + b.substring(c.index) + "].")
            }

            function g() {
                if (0 === N.length) throw z("Unexpected end of expression: " + b);
                return N[0]
            }

            function h(a, b, c, d) {
                if (N.length > 0) {
                    var e = N[0],
                        f = e.text;
                    if (f == a || f == b || f == c || f == d || !a && !b && !c && !d) return e
                }
                return !1
            }

            function f(b, c, d, f) {
                return (b = h(b, c, d, f)) ? (a && !b.json && e("is not valid json", b), N.shift(), b) : !1
            }

            function i(a) {
                f(a) || e("is unexpected, expecting [" + a + "]", h())
            }

            function j(a, b) {
                return function(c, d) {
                    return a(c, d, b)
                }
            }

            function k(a, b, c) {
                return function(d, f) {
                    return b(d, f, a, c)
                }
            }

            function l() {
                for (var a = [];;)
                    if (N.length > 0 && !h("}", ")", ";", "]") && a.push(v()), !f(";")) return 1 == a.length ? a[0] : function(b, c) {
                        for (var d, f = 0; f < a.length; f++) {
                            var e = a[f];
                            e && (d = e(b, c))
                        }
                        return d
                    }
            }

            function n() {
                for (var a = f(), b = c(a.text), d = [];;) {
                    if (!(a = f(":"))) {
                        var e = function(a, c, f) {
                            for (var f = [f], e = 0; e < d.length; e++) f.push(d[e](a, c));
                            return b.apply(a, f)
                        };
                        return function() {
                            return e
                        }
                    }
                    d.push(F())
                }
            }

            function r() {
                for (var b, a = o();;) {
                    if (!(b = f("||"))) return a;
                    a = k(a, b.fn, o())
                }
            }

            function o() {
                var b, a = w();
                return (b = f("&&")) && (a = k(a, b.fn, o())), a
            }

            function w() {
                var b, a = q();
                return (b = f("==", "!=")) && (a = k(a, b.fn, w())), a
            }

            function q() {
                var a;
                a = t();
                for (var b; b = f("+", "-");) a = k(a, b.fn, t());
                return (b = f("<", ">", "<=", ">=")) && (a = k(a, b.fn, q())), a
            }

            function t() {
                for (var b, a = m(); b = f("*", "/", "%");) a = k(a, b.fn, m());
                return a
            }

            function m() {
                var a;
                return f("+") ? A() : (a = f("-")) ? k(V, a.fn, m()) : (a = f("!")) ? j(a.fn, m()) : A()
            }

            function A() {
                var a;
                if (f("(")) a = v(), i(")");
                else if (f("[")) a = y();
                else if (f("{")) a = L();
                else {
                    var b = f();
                    (a = b.fn) || e("not a primary expression", b)
                }
                for (var c; b = f("(", "[", ".");) "(" === b.text ? (a = u(a, c), c = null) : "[" === b.text ? (c = a, a = da(a)) : "." === b.text ? (c = a, a = s(a)) : e("IMPOSSIBLE");
                return a
            }

            function y() {
                var a = [];
                if ("]" != g().text)
                    do a.push(F()); while (f(","));
                return i("]"),
                    function(b, c) {
                        for (var d = [], f = 0; f < a.length; f++) d.push(a[f](b, c));
                        return d
                    }
            }

            function L() {
                var a = [];
                if ("}" != g().text)
                    do {
                        var b = f(),
                            b = b.string || b.text;
                        i(":");
                        var c = F();
                        a.push({
                            key: b,
                            value: c
                        })
                    } while (f(","));
                return i("}"),
                    function(b, c) {
                        for (var d = {}, f = 0; f < a.length; f++) {
                            var e = a[f],
                                j = e.value(b, c);
                            d[e.key] = j
                        }
                        return d
                    }
            }
            var I, V = B(0),
                N = Jc(b, d),
                F = function() {
                    var c, d, a = r();
                    return (d = f("=")) ? (a.assign || e("implies assignment but [" + b.substring(0, d.index) + "] can not be assigned to", d), c = r(), function(b, d) {
                        return a.assign(b, c(b, d), d)
                    }) : a
                },
                u = function(a, b) {
                    var c = [];
                    if (")" != g().text)
                        do c.push(F()); while (f(","));
                    return i(")"),
                        function(d, f) {
                            for (var e = [], j = b ? b(d, f) : d, g = 0; g < c.length; g++) e.push(c[g](d, f));
                            return g = a(d, f) || x, g.apply ? g.apply(j, e) : g(e[0], e[1], e[2], e[3], e[4])
                        }
                },
                s = function(a) {
                    var b = f().text,
                        c = Jb(b, d);
                    return D(function(b, d) {
                        return c(a(b, d), d)
                    }, {
                        assign: function(c, d, f) {
                            return Kb(a(c, f), b, d)
                        }
                    })
                },
                da = function(a) {
                    var b = F();
                    return i("]"), D(function(c, d) {
                        var j, f = a(c, d),
                            e = b(c, d);
                        return f ? ((f = f[e]) && f.then && (j = f, "$$v" in f || (j.$$v = p, j.then(function(a) {
                            j.$$v = a
                        })), f = f.$$v), f) : p
                    }, {
                        assign: function(c, d, f) {
                            return a(c, f)[b(c, f)] = d
                        }
                    })
                },
                v = function() {
                    for (var b, a = F();;) {
                        if (!(b = f("|"))) return a;
                        a = k(a, b.fn, n())
                    }
                };
            return a ? (F = r, u = s = da = v = function() {
                e("is not valid json", {
                    text: b,
                    index: 0
                })
            }, I = A()) : I = l(), 0 !== N.length && e("is an unexpected token", N[0]), I
        }

        function Kb(b, a, c) {
            for (var a = a.split("."), d = 0; a.length > 1; d++) {
                var e = a.shift(),
                    g = b[e];
                g || (g = {}, b[e] = g), b = g
            }
            return b[a.shift()] = c
        }

        function eb(b, a, c) {
            if (!a) return b;
            for (var d, a = a.split("."), e = b, g = a.length, h = 0; g > h; h++) d = a[h], b && (b = (e = b)[d]);
            return !c && M(b) ? Va(e, b) : b
        }

        function Lb(b, a, c, d, e) {
            return function(g, h) {
                var i, f = h && h.hasOwnProperty(b) ? h : g;
                return null === f || f === p ? f : ((f = f[b]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), a && null !== f && f !== p ? ((f = f[a]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), c && null !== f && f !== p ? ((f = f[c]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), d && null !== f && f !== p ? ((f = f[d]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), e && null !== f && f !== p ? ((f = f[e]) && f.then && ("$$v" in f || (i = f, i.$$v = p, i.then(function(a) {
                    i.$$v = a
                })), f = f.$$v), f) : f) : f) : f) : f)
            }
        }

        function Jb(b, a) {
            if (gb.hasOwnProperty(b)) return gb[b];
            var e, c = b.split("."),
                d = c.length;
            if (a) e = 6 > d ? Lb(c[0], c[1], c[2], c[3], c[4]) : function(a, b) {
                var j, e = 0;
                do j = Lb(c[e++], c[e++], c[e++], c[e++], c[e++])(a, b), b = p, a = j; while (d > e);
                return j
            };
            else {
                var g = "var l, fn, p;\n";
                m(c, function(a, b) {
                    g += "if(s === null || s === undefined) return s;\nl=s;\ns=" + (b ? "s" : '((k&&k.hasOwnProperty("' + a + '"))?k:s)') + '["' + a + '"];\nif (s && s.then) {\n if (!("$$v" in s)) {\n p=s;\n p.$$v = undefined;\n p.then(function(v) {p.$$v=v;});\n}\n s=s.$$v\n}\n'
                }), g += "return s;", e = Function("s", "k", g), e.toString = function() {
                    return g
                }
            }
            return gb[b] = e
        }

        function Mc() {
            var b = {};
            this.$get = ["$filter", "$sniffer", function(a, c) {
                return function(d) {
                    switch (typeof d) {
                        case "string":
                            return b.hasOwnProperty(d) ? b[d] : b[d] = Lc(d, !1, a, c.csp);
                        case "function":
                            return d;
                        default:
                            return x
                    }
                }
            }]
        }

        function Nc() {
            this.$get = ["$rootScope", "$exceptionHandler", function(b, a) {
                return Oc(function(a) {
                    b.$evalAsync(a)
                }, a)
            }]
        }

        function Oc(b, a) {
            function c(a) {
                return a
            }

            function d(a) {
                return h(a)
            }
            var e = function() {
                    var i, j, f = [];
                    return j = {
                        resolve: function(a) {
                            if (f) {
                                var c = f;
                                f = p, i = g(a), c.length && b(function() {
                                    for (var a, b = 0, d = c.length; d > b; b++) a = c[b], i.then(a[0], a[1])
                                })
                            }
                        },
                        reject: function(a) {
                            j.resolve(h(a))
                        },
                        promise: {
                            then: function(b, j) {
                                var g = e(),
                                    h = function(d) {
                                        try {
                                            g.resolve((b || c)(d))
                                        } catch (f) {
                                            a(f), g.reject(f)
                                        }
                                    },
                                    o = function(b) {
                                        try {
                                            g.resolve((j || d)(b))
                                        } catch (c) {
                                            a(c), g.reject(c)
                                        }
                                    };
                                return f ? f.push([h, o]) : i.then(h, o), g.promise
                            }
                        }
                    }
                },
                g = function(a) {
                    return a && a.then ? a : {
                        then: function(c) {
                            var d = e();
                            return b(function() {
                                d.resolve(c(a))
                            }), d.promise
                        }
                    }
                },
                h = function(a) {
                    return {
                        then: function(c, j) {
                            var g = e();
                            return b(function() {
                                g.resolve((j || d)(a))
                            }), g.promise
                        }
                    }
                };
            return {
                defer: e,
                reject: h,
                when: function(f, i, j) {
                    var l, k = e(),
                        n = function(b) {
                            try {
                                return (i || c)(b)
                            } catch (d) {
                                return a(d), h(d)
                            }
                        },
                        r = function(b) {
                            try {
                                return (j || d)(b)
                            } catch (c) {
                                return a(c), h(c)
                            }
                        };
                    return b(function() {
                        g(f).then(function(a) {
                            l || (l = !0, k.resolve(g(a).then(n, r)))
                        }, function(a) {
                            l || (l = !0, k.resolve(r(a)))
                        })
                    }), k.promise
                },
                all: function(a) {
                    var b = e(),
                        c = a.length,
                        d = [];
                    return c ? m(a, function(a, e) {
                        g(a).then(function(a) {
                            e in d || (d[e] = a, --c || b.resolve(d))
                        }, function(a) {
                            e in d || b.reject(a)
                        })
                    }) : b.resolve(d), b.promise
                }
            }
        }

        function Pc() {
            var b = {};
            this.when = function(a, c) {
                if (b[a] = D({
                        reloadOnSearch: !0
                    }, c), a) {
                    var d = "/" == a[a.length - 1] ? a.substr(0, a.length - 1) : a + "/";
                    b[d] = {
                        redirectTo: a
                    }
                }
                return this
            }, this.otherwise = function(a) {
                return this.when(null, a), this
            }, this.$get = ["$rootScope", "$location", "$routeParams", "$q", "$injector", "$http", "$templateCache", function(a, c, d, e, g, h, f) {
                function i() {
                    var b = j(),
                        i = r.current;
                    b && i && b.$route === i.$route && fa(b.pathParams, i.pathParams) && !b.reloadOnSearch && !n ? (i.params = b.params, U(i.params, d), a.$broadcast("$routeUpdate", i)) : (b || i) && (n = !1, a.$broadcast("$routeChangeStart", b, i), (r.current = b) && b.redirectTo && (G(b.redirectTo) ? c.path(k(b.redirectTo, b.params)).search(b.params).replace() : c.url(b.redirectTo(b.pathParams, c.path(), c.search())).replace()), e.when(b).then(function() {
                        if (b) {
                            var d, a = [],
                                c = [];
                            return m(b.resolve || {}, function(b, d) {
                                a.push(d), c.push(M(b) ? g.invoke(b) : g.get(b))
                            }), s(d = b.template) || s(d = b.templateUrl) && (d = h.get(d, {
                                cache: f
                            }).then(function(a) {
                                return a.data
                            })), s(d) && (a.push("$template"), c.push(d)), e.all(c).then(function(b) {
                                var c = {};
                                return m(b, function(b, d) {
                                    c[a[d]] = b
                                }), c
                            })
                        }
                    }).then(function(c) {
                        b == r.current && (b && (b.locals = c, U(b.params, d)), a.$broadcast("$routeChangeSuccess", b, i))
                    }, function(c) {
                        b == r.current && a.$broadcast("$routeChangeError", b, i, c)
                    }))
                }

                function j() {
                    var a, d;
                    return m(b, function(b, e) {
                        !d && (a = l(c.path(), e)) && (d = xa(b, {
                            params: D({}, c.search(), a),
                            pathParams: a
                        }), d.$route = b)
                    }), d || b[null] && xa(b[null], {
                        params: {},
                        pathParams: {}
                    })
                }

                function k(a, b) {
                    var c = [];
                    return m((a || "").split(":"), function(a, d) {
                        if (0 == d) c.push(a);
                        else {
                            var e = a.match(/(\w+)(.*)/),
                                f = e[1];
                            c.push(b[f]), c.push(e[2] || ""), delete b[f]
                        }
                    }), c.join("")
                }
                var l = function(a, b) {
                        var c = "^" + b.replace(/([\.\\\(\)\^\$])/g, "\\$1") + "$",
                            d = [],
                            e = {};
                        m(b.split(/\W/), function(a) {
                            if (a) {
                                var b = RegExp(":" + a + "([\\W])");
                                c.match(b) && (c = c.replace(b, "([^\\/]*)$1"), d.push(a))
                            }
                        });
                        var f = a.match(RegExp(c));
                        return f && m(d, function(a, b) {
                            e[a] = f[b + 1]
                        }), f ? e : null
                    },
                    n = !1,
                    r = {
                        routes: b,
                        reload: function() {
                            n = !0, a.$evalAsync(i)
                        }
                    };
                return a.$on("$locationChangeSuccess", i), r
            }]
        }

        function Qc() {
            this.$get = B({})
        }

        function Rc() {
            var b = 10;
            this.digestTtl = function(a) {
                return arguments.length && (b = a), b
            }, this.$get = ["$injector", "$exceptionHandler", "$parse", function(a, c, d) {
                function e() {
                    this.$id = wa(), this.$$phase = this.$parent = this.$$watchers = this.$$nextSibling = this.$$prevSibling = this.$$childHead = this.$$childTail = null, this["this"] = this.$root = this, this.$$asyncQueue = [], this.$$listeners = {}
                }

                function g(a) {
                    if (i.$$phase) throw z(i.$$phase + " already in progress");
                    i.$$phase = a
                }

                function h(a, b) {
                    var c = d(a);
                    return qa(c, b), c
                }

                function f() {}
                e.prototype = {
                    $new: function(a) {
                        if (M(a)) throw z("API-CHANGE: Use $controller to instantiate controllers.");
                        return a ? (a = new e, a.$root = this.$root) : (a = function() {}, a.prototype = this, a = new a, a.$id = wa()), a["this"] = a, a.$$listeners = {}, a.$parent = this, a.$$asyncQueue = [], a.$$watchers = a.$$nextSibling = a.$$childHead = a.$$childTail = null, a.$$prevSibling = this.$$childTail, this.$$childHead ? this.$$childTail = this.$$childTail.$$nextSibling = a : this.$$childHead = this.$$childTail = a, a
                    },
                    $watch: function(a, b, c) {
                        var d = h(a, "watch"),
                            e = this.$$watchers,
                            g = {
                                fn: b,
                                last: f,
                                get: d,
                                exp: a,
                                eq: !!c
                            };
                        if (!M(b)) {
                            var i = h(b || x, "listener");
                            g.fn = function(a, b, c) {
                                i(c)
                            }
                        }
                        return e || (e = this.$$watchers = []), e.unshift(g),
                            function() {
                                za(e, g)
                            }
                    },
                    $digest: function() {
                        var a, d, e, h, r, o, m, t, A, y, q = b,
                            p = [];
                        g("$digest");
                        do {
                            m = !1, t = this;
                            do {
                                for (r = t.$$asyncQueue; r.length;) try {
                                    t.$eval(r.shift())
                                } catch (L) {
                                    c(L)
                                }
                                if (h = t.$$watchers)
                                    for (o = h.length; o--;) try {
                                        a = h[o], (d = a.get(t)) === (e = a.last) || (a.eq ? fa(d, e) : "number" == typeof d && "number" == typeof e && isNaN(d) && isNaN(e)) || (m = !0, a.last = a.eq ? U(d) : d, a.fn(d, e === f ? d : e, t), 5 > q && (A = 4 - q, p[A] || (p[A] = []), y = M(a.exp) ? "fn: " + (a.exp.name || a.exp.toString()) : a.exp, y += "; newVal: " + ba(d) + "; oldVal: " + ba(e), p[A].push(y)))
                                    } catch (V) {
                                        c(V)
                                    }
                                if (!(h = t.$$childHead || t !== this && t.$$nextSibling))
                                    for (; t !== this && !(h = t.$$nextSibling);) t = t.$parent
                            } while (t = h);
                            if (m && !q--) throw i.$$phase = null, z(b + " $digest() iterations reached. Aborting!\nWatchers fired in the last 5 iterations: " + ba(p))
                        } while (m || r.length);
                        i.$$phase = null
                    },
                    $destroy: function() {
                        if (i != this) {
                            var a = this.$parent;
                            this.$broadcast("$destroy"), a.$$childHead == this && (a.$$childHead = this.$$nextSibling), a.$$childTail == this && (a.$$childTail = this.$$prevSibling), this.$$prevSibling && (this.$$prevSibling.$$nextSibling = this.$$nextSibling), this.$$nextSibling && (this.$$nextSibling.$$prevSibling = this.$$prevSibling)
                        }
                    },
                    $eval: function(a, b) {
                        return d(a)(this, b)
                    },
                    $evalAsync: function(a) {
                        this.$$asyncQueue.push(a)
                    },
                    $apply: function(a) {
                        try {
                            return g("$apply"), this.$eval(a)
                        } catch (b) {
                            c(b)
                        } finally {
                            i.$$phase = null;
                            try {
                                i.$digest()
                            } catch (d) {
                                throw c(d), d
                            }
                        }
                    },
                    $on: function(a, b) {
                        var c = this.$$listeners[a];
                        return c || (this.$$listeners[a] = c = []), c.push(b),
                            function() {
                                za(c, b)
                            }
                    },
                    $emit: function(a) {
                        var e, m, p, d = [],
                            f = this,
                            g = !1,
                            i = {
                                name: a,
                                targetScope: f,
                                stopPropagation: function() {
                                    g = !0
                                },
                                preventDefault: function() {
                                    i.defaultPrevented = !0
                                },
                                defaultPrevented: !1
                            },
                            h = [i].concat(ga.call(arguments, 1));
                        do {
                            for (e = f.$$listeners[a] || d, i.currentScope = f, m = 0, p = e.length; p > m; m++) try {
                                if (e[m].apply(null, h), g) return i
                            } catch (A) {
                                c(A)
                            }
                            f = f.$parent
                        } while (f);
                        return i
                    },
                    $broadcast: function(a) {
                        var d = this,
                            e = this,
                            f = {
                                name: a,
                                targetScope: this,
                                preventDefault: function() {
                                    f.defaultPrevented = !0
                                },
                                defaultPrevented: !1
                            },
                            g = [f].concat(ga.call(arguments, 1));
                        do
                            if (d = e, f.currentScope = d, m(d.$$listeners[a], function(a) {
                                    try {
                                        a.apply(null, g)
                                    } catch (b) {
                                        c(b)
                                    }
                                }), !(e = d.$$childHead || d !== this && d.$$nextSibling))
                                for (; d !== this && !(e = d.$$nextSibling);) d = d.$parent;
                        while (d = e);
                        return f
                    }
                };
                var i = new e;
                return i
            }]
        }

        function Sc() {
            this.$get = ["$window", function(b) {
                var a = {},
                    c = H((/android (\d+)/.exec(C(b.navigator.userAgent)) || [])[1]);
                return {
                    history: !(!b.history || !b.history.pushState || 4 > c),
                    hashchange: "onhashchange" in b && (!b.document.documentMode || b.document.documentMode > 7),
                    hasEvent: function(c) {
                        if ("input" == c && 9 == Z) return !1;
                        if (v(a[c])) {
                            var e = b.document.createElement("div");
                            a[c] = "on" + c in e
                        }
                        return a[c]
                    },
                    csp: !1
                }
            }]
        }

        function Tc() {
            this.$get = B(T)
        }

        function Mb(b) {
            var c, d, e, a = {};
            return b ? (m(b.split("\n"), function(b) {
                e = b.indexOf(":"), c = C(Q(b.substr(0, e))), d = Q(b.substr(e + 1)), c && (a[c] ? a[c] += ", " + d : a[c] = d)
            }), a) : a
        }

        function Nb(b) {
            var a = J(b) ? b : p;
            return function(c) {
                return a || (a = Mb(b)), c ? a[C(c)] || null : a
            }
        }

        function Ob(b, a, c) {
            return M(c) ? c(b, a) : (m(c, function(c) {
                b = c(b, a)
            }), b)
        }

        function Uc() {
            var b = /^\s*(\[|\{[^\{])/,
                a = /[\}\]]\s*$/,
                c = /^\)\]\}',?\n/,
                d = this.defaults = {
                    transformResponse: [function(d) {
                        return G(d) && (d = d.replace(c, ""), b.test(d) && a.test(d) && (d = mb(d, !0))), d
                    }],
                    transformRequest: [function(a) {
                        return J(a) && "[object File]" !== Sa.apply(a) ? ba(a) : a
                    }],
                    headers: {
                        common: {
                            Accept: "application/json, text/plain, */*",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        post: {
                            "Content-Type": "application/json;charset=utf-8"
                        },
                        put: {
                            "Content-Type": "application/json;charset=utf-8"
                        }
                    }
                },
                e = this.responseInterceptors = [];
            this.$get = ["$httpBackend", "$browser", "$cacheFactory", "$rootScope", "$q", "$injector", function(a, b, c, i, j, k) {
                function l(a) {
                    function c(a) {
                        var b = D({}, a, {
                            data: Ob(a.data, a.headers, f)
                        });
                        return 200 <= a.status && a.status < 300 ? b : j.reject(b)
                    }
                    a.method = la(a.method);
                    var i, e = a.transformRequest || d.transformRequest,
                        f = a.transformResponse || d.transformResponse,
                        g = d.headers,
                        g = D({
                            "X-XSRF-TOKEN": b.cookies()["XSRF-TOKEN"]
                        }, g.common, g[C(a.method)], a.headers),
                        e = Ob(a.data, Nb(g), e);
                    return v(a.data) && delete g["Content-Type"], i = n(a, e, g), i = i.then(c, c), m(w, function(a) {
                        i = a(i)
                    }), i.success = function(b) {
                        return i.then(function(c) {
                            b(c.data, c.status, c.headers, a)
                        }), i
                    }, i.error = function(b) {
                        return i.then(null, function(c) {
                            b(c.data, c.status, c.headers, a)
                        }), i
                    }, i
                }

                function n(b, c, d) {
                    function e(a, b, c) {
                        m && (a >= 200 && 300 > a ? m.put(w, [a, b, Mb(c)]) : m.remove(w)), f(b, a, c), i.$apply()
                    }

                    function f(a, c, d) {
                        c = Math.max(c, 0), (c >= 200 && 300 > c ? n.resolve : n.reject)({
                            data: a,
                            status: c,
                            headers: Nb(d),
                            config: b
                        })
                    }

                    function h() {
                        var a = Ua(l.pendingRequests, b); - 1 !== a && l.pendingRequests.splice(a, 1)
                    }
                    var m, p, n = j.defer(),
                        k = n.promise,
                        w = r(b.url, b.params);
                    if (l.pendingRequests.push(b), k.then(h, h), b.cache && "GET" == b.method && (m = J(b.cache) ? b.cache : o), m)
                        if (p = m.get(w)) {
                            if (p.then) return p.then(h, h), p;
                            K(p) ? f(p[1], p[0], U(p[2])) : f(p, 200, {})
                        } else m.put(w, k);
                    return p || a(b.method, w, c, e, d, b.timeout, b.withCredentials), k
                }

                function r(a, b) {
                    if (!b) return a;
                    var c = [];
                    return dc(b, function(a, b) {
                        null == a || a == p || (J(a) && (a = ba(a)), c.push(encodeURIComponent(b) + "=" + encodeURIComponent(a)))
                    }), a + (-1 == a.indexOf("?") ? "?" : "&") + c.join("&")
                }
                var o = c("$http"),
                    w = [];
                return m(e, function(a) {
                        w.push(G(a) ? k.get(a) : k.invoke(a))
                    }), l.pendingRequests = [],
                    function() {
                        m(arguments, function(a) {
                            l[a] = function(b, c) {
                                return l(D(c || {}, {
                                    method: a,
                                    url: b
                                }))
                            }
                        })
                    }("get", "delete", "head", "jsonp"),
                    function() {
                        m(arguments, function(a) {
                            l[a] = function(b, c, d) {
                                return l(D(d || {}, {
                                    method: a,
                                    url: b,
                                    data: c
                                }))
                            }
                        })
                    }("post", "put"), l.defaults = d, l
            }]
        }

        function Vc() {
            this.$get = ["$browser", "$window", "$document", function(b, a, c) {
                return Wc(b, Xc, b.defer, a.angular.callbacks, c[0], a.location.protocol.replace(":", ""))
            }]
        }

        function Wc(b, a, c, d, e, g) {
            function h(a, b) {
                var c = e.createElement("script"),
                    d = function() {
                        e.body.removeChild(c), b && b()
                    };
                c.type = "text/javascript", c.src = a, Z ? c.onreadystatechange = function() {
                    /loaded|complete/.test(c.readyState) && d()
                } : c.onload = c.onerror = d, e.body.appendChild(c)
            }
            return function(e, i, j, k, l, n, r) {
                function o(a, c, d, e) {
                    c = "file" == (i.match(Fb) || ["", g])[1] ? d ? 200 : 404 : c, a(1223 == c ? 204 : c, d, e), b.$$completeOutstandingRequest(x)
                }
                if (b.$$incOutstandingRequestCount(), i = i || b.url(), "jsonp" == C(e)) {
                    var p = "_" + (d.counter++).toString(36);
                    d[p] = function(a) {
                        d[p].data = a
                    }, h(i.replace("JSON_CALLBACK", "angular.callbacks." + p), function() {
                        d[p].data ? o(k, 200, d[p].data) : o(k, -2), delete d[p]
                    })
                } else {
                    var q = new a;
                    q.open(e, i, !0), m(l, function(a, b) {
                        a && q.setRequestHeader(b, a)
                    });
                    var t;
                    q.onreadystatechange = function() {
                        4 == q.readyState && o(k, t || q.status, q.responseText, q.getAllResponseHeaders())
                    }, r && (q.withCredentials = !0), q.send(j || ""), n > 0 && c(function() {
                        t = -1, q.abort()
                    }, n)
                }
            }
        }

        function Yc() {
            this.$get = function() {
                return {
                    id: "en-us",
                    NUMBER_FORMATS: {
                        DECIMAL_SEP: ".",
                        GROUP_SEP: ",",
                        PATTERNS: [{
                            minInt: 1,
                            minFrac: 0,
                            maxFrac: 3,
                            posPre: "",
                            posSuf: "",
                            negPre: "-",
                            negSuf: "",
                            gSize: 3,
                            lgSize: 3
                        }, {
                            minInt: 1,
                            minFrac: 2,
                            maxFrac: 2,
                            posPre: "\xa4",
                            posSuf: "",
                            negPre: "(\xa4",
                            negSuf: ")",
                            gSize: 3,
                            lgSize: 3
                        }],
                        CURRENCY_SYM: "$"
                    },
                    DATETIME_FORMATS: {
                        MONTH: "January,February,March,April,May,June,July,August,September,October,November,December".split(","),
                        SHORTMONTH: "Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec".split(","),
                        DAY: "Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday".split(","),
                        SHORTDAY: "Sun,Mon,Tue,Wed,Thu,Fri,Sat".split(","),
                        AMPMS: ["AM", "PM"],
                        medium: "MMM d, y h:mm:ss a",
                        "short": "M/d/yy h:mm a",
                        fullDate: "EEEE, MMMM d, y",
                        longDate: "MMMM d, y",
                        mediumDate: "MMM d, y",
                        shortDate: "M/d/yy",
                        mediumTime: "h:mm:ss a",
                        shortTime: "h:mm a"
                    },
                    pluralCat: function(b) {
                        return 1 === b ? "one" : "other"
                    }
                }
            }
        }

        function Zc() {
            this.$get = ["$rootScope", "$browser", "$q", "$exceptionHandler", function(b, a, c, d) {
                function e(e, f, i) {
                    var j = c.defer(),
                        k = j.promise,
                        l = s(i) && !i,
                        f = a.defer(function() {
                            try {
                                j.resolve(e())
                            } catch (a) {
                                j.reject(a), d(a)
                            }
                            l || b.$apply()
                        }, f),
                        i = function() {
                            delete g[k.$$timeoutId]
                        };
                    return k.$$timeoutId = f, g[f] = j, k.then(i, i), k
                }
                var g = {};
                return e.cancel = function(b) {
                    return b && b.$$timeoutId in g ? (g[b.$$timeoutId].reject("canceled"), a.defer.cancel(b.$$timeoutId)) : !1
                }, e
            }]
        }

        function Pb(b) {
            function a(a, e) {
                return b.factory(a + c, e)
            }
            var c = "Filter";
            this.register = a, this.$get = ["$injector", function(a) {
                return function(b) {
                    return a.get(b + c)
                }
            }], a("currency", Qb), a("date", Rb), a("filter", $c), a("json", ad), a("limitTo", bd), a("lowercase", cd), a("number", Sb), a("orderBy", Tb), a("uppercase", dd)
        }

        function $c() {
            return function(b, a) {
                if (!(b instanceof Array)) return b;
                var c = [];
                c.check = function(a) {
                    for (var b = 0; b < c.length; b++)
                        if (!c[b](a)) return !1;
                    return !0
                };
                var d = function(a, b) {
                    if ("!" === b.charAt(0)) return !d(a, b.substr(1));
                    switch (typeof a) {
                        case "boolean":
                        case "number":
                        case "string":
                            return ("" + a).toLowerCase().indexOf(b) > -1;
                        case "object":
                            for (var c in a)
                                if ("$" !== c.charAt(0) && d(a[c], b)) return !0;
                            return !1;
                        case "array":
                            for (c = 0; c < a.length; c++)
                                if (d(a[c], b)) return !0;
                            return !1;
                        default:
                            return !1
                    }
                };
                switch (typeof a) {
                    case "boolean":
                    case "number":
                    case "string":
                        a = {
                            $: a
                        };
                    case "object":
                        for (var e in a) "$" == e ? function() {
                            var b = ("" + a[e]).toLowerCase();
                            b && c.push(function(a) {
                                return d(a, b)
                            })
                        }() : function() {
                            var b = e,
                                f = ("" + a[e]).toLowerCase();
                            f && c.push(function(a) {
                                return d(eb(a, b), f)
                            })
                        }();
                        break;
                    case "function":
                        c.push(a);
                        break;
                    default:
                        return b
                }
                for (var g = [], h = 0; h < b.length; h++) {
                    var f = b[h];
                    c.check(f) && g.push(f)
                }
                return g
            }
        }

        function Qb(b) {
            var a = b.NUMBER_FORMATS;
            return function(b, d) {
                return v(d) && (d = a.CURRENCY_SYM), Ub(b, a.PATTERNS[1], a.GROUP_SEP, a.DECIMAL_SEP, 2).replace(/\u00A4/g, d)
            }
        }

        function Sb(b) {
            var a = b.NUMBER_FORMATS;
            return function(b, d) {
                return Ub(b, a.PATTERNS[0], a.GROUP_SEP, a.DECIMAL_SEP, d)
            }
        }

        function Ub(b, a, c, d, e) {
            if (isNaN(b) || !isFinite(b)) return "";
            var g = 0 > b,
                b = Math.abs(b),
                h = b + "",
                f = "",
                i = [];
            if (-1 !== h.indexOf("e")) f = h;
            else {
                h = (h.split(Vb)[1] || "").length, v(e) && (e = Math.min(Math.max(a.minFrac, h), a.maxFrac));
                var h = Math.pow(10, e),
                    b = Math.round(b * h) / h,
                    b = ("" + b).split(Vb),
                    h = b[0],
                    b = b[1] || "",
                    j = 0,
                    k = a.lgSize,
                    l = a.gSize;
                if (h.length >= k + l)
                    for (var j = h.length - k, n = 0; j > n; n++)(j - n) % l === 0 && 0 !== n && (f += c), f += h.charAt(n);
                for (n = j; n < h.length; n++)(h.length - n) % k === 0 && 0 !== n && (f += c), f += h.charAt(n);
                for (; b.length < e;) b += "0";
                e && (f += d + b.substr(0, e))
            }
            return i.push(g ? a.negPre : a.posPre), i.push(f), i.push(g ? a.negSuf : a.posSuf), i.join("")
        }

        function hb(b, a, c) {
            var d = "";
            for (0 > b && (d = "-", b = -b), b = "" + b; b.length < a;) b = "0" + b;
            return c && (b = b.substr(b.length - a)), d + b
        }

        function O(b, a, c, d) {
            return function(e) {
                return e = e["get" + b](), (c > 0 || e > -c) && (e += c), 0 === e && -12 == c && (e = 12), hb(e, a, d)
            }
        }

        function La(b, a) {
            return function(c, d) {
                var e = c["get" + b](),
                    g = la(a ? "SHORT" + b : b);
                return d[g][e]
            }
        }

        function Rb(b) {
            function a(a) {
                var b;
                if (b = a.match(c)) {
                    var a = new Date(0),
                        g = 0,
                        h = 0;
                    b[9] && (g = H(b[9] + b[10]), h = H(b[9] + b[11])), a.setUTCFullYear(H(b[1]), H(b[2]) - 1, H(b[3])), a.setUTCHours(H(b[4] || 0) - g, H(b[5] || 0) - h, H(b[6] || 0), H(b[7] || 0))
                }
                return a
            }
            var c = /^(\d{4})-?(\d\d)-?(\d\d)(?:T(\d\d)(?::?(\d\d)(?::?(\d\d)(?:\.(\d{3}))?)?)?(Z|([+-])(\d\d):?(\d\d)))?$/;
            return function(c, e) {
                var f, i, g = "",
                    h = [],
                    e = e || "mediumDate",
                    e = b.DATETIME_FORMATS[e] || e;
                if (G(c) && (c = ed.test(c) ? H(c) : a(c)), va(c) && (c = new Date(c)), !ma(c)) return c;
                for (; e;)(i = fd.exec(e)) ? (h = h.concat(ga.call(i, 1)), e = h.pop()) : (h.push(e), e = null);
                return m(h, function(a) {
                    f = gd[a], g += f ? f(c, b.DATETIME_FORMATS) : a.replace(/(^'|'$)/g, "").replace(/''/g, "'")
                }), g
            }
        }

        function ad() {
            return function(b) {
                return ba(b, !0)
            }
        }

        function bd() {
            return function(b, a) {
                if (!(b instanceof Array)) return b;
                var d, e, a = H(a),
                    c = [];
                if (!(b && b instanceof Array)) return c;
                for (a > b.length ? a = b.length : a < -b.length && (a = -b.length), a > 0 ? (d = 0, e = a) : (d = b.length + a, e = b.length); e > d; d++) c.push(b[d]);
                return c
            }
        }

        function Tb(b) {
            return function(a, c, d) {
                function e(a, b) {
                    return Wa(b) ? function(b, c) {
                        return a(c, b)
                    } : a
                }
                if (!(a instanceof Array)) return a;
                if (!c) return a;
                for (var c = K(c) ? c : [c], c = Ta(c, function(a) {
                        var c = !1,
                            d = a || ya;
                        return G(a) && (("+" == a.charAt(0) || "-" == a.charAt(0)) && (c = "-" == a.charAt(0), a = a.substring(1)), d = b(a)), e(function(a, b) {
                            var c;
                            c = d(a);
                            var e = d(b),
                                f = typeof c,
                                g = typeof e;
                            return f == g ? ("string" == f && (c = c.toLowerCase()), "string" == f && (e = e.toLowerCase()), c = c === e ? 0 : e > c ? -1 : 1) : c = g > f ? -1 : 1, c
                        }, c)
                    }), g = [], h = 0; h < a.length; h++) g.push(a[h]);
                return g.sort(e(function(a, b) {
                    for (var d = 0; d < c.length; d++) {
                        var e = c[d](a, b);
                        if (0 !== e) return e
                    }
                    return 0
                }, d))
            }
        }

        function R(b) {
            return M(b) && (b = {
                link: b
            }), b.restrict = b.restrict || "AC", B(b)
        }

        function Wb(b, a) {
            function c(a, c) {
                c = c ? "-" + $a(c, "-") : "", b.removeClass((a ? Ma : Na) + c).addClass((a ? Na : Ma) + c)
            }
            var d = this,
                e = b.parent().controller("form") || Oa,
                g = 0,
                h = d.$error = {};
            d.$name = a.name, d.$dirty = !1, d.$pristine = !0, d.$valid = !0, d.$invalid = !1, e.$addControl(d), b.addClass(Pa), c(!0), d.$addControl = function(a) {
                a.$name && !d.hasOwnProperty(a.$name) && (d[a.$name] = a)
            }, d.$removeControl = function(a) {
                a.$name && d[a.$name] === a && delete d[a.$name], m(h, function(b, c) {
                    d.$setValidity(c, !0, a)
                })
            }, d.$setValidity = function(a, b, j) {
                var k = h[a];
                if (b) k && (za(k, j), !k.length) && (g--, g || (c(b), d.$valid = !0, d.$invalid = !1), h[a] = !1, c(!0, a), e.$setValidity(a, !0, d));
                else {
                    if (g || c(b), k) {
                        if (-1 != Ua(k, j)) return
                    } else h[a] = k = [], g++, c(!1, a), e.$setValidity(a, !1, d);
                    k.push(j), d.$valid = !1, d.$invalid = !0
                }
            }, d.$setDirty = function() {
                b.removeClass(Pa).addClass(Xb), d.$dirty = !0, d.$pristine = !1
            }
        }

        function S(b) {
            return v(b) || "" === b || null === b || b !== b
        }

        function Qa(b, a, c, d, e, g) {
            var h = function() {
                var c = Q(a.val());
                d.$viewValue !== c && b.$apply(function() {
                    d.$setViewValue(c)
                })
            };
            if (e.hasEvent("input")) a.bind("input", h);
            else {
                var f;
                a.bind("keydown", function(a) {
                    a = a.keyCode, 91 === a || a > 15 && 19 > a || a >= 37 && 40 >= a || f || (f = g.defer(function() {
                        h(), f = null
                    }))
                }), a.bind("change", h)
            }
            d.$render = function() {
                a.val(S(d.$viewValue) ? "" : d.$viewValue)
            };
            var i = c.ngPattern,
                j = function(a, b) {
                    return S(b) || a.test(b) ? (d.$setValidity("pattern", !0), b) : (d.$setValidity("pattern", !1), p)
                };
            if (i && (i.match(/^\/(.*)\/$/) ? (i = RegExp(i.substr(1, i.length - 2)), e = function(a) {
                    return j(i, a)
                }) : e = function(a) {
                    var c = b.$eval(i);
                    if (!c || !c.test) throw new z("Expected " + i + " to be a RegExp but was " + c);
                    return j(c, a)
                }, d.$formatters.push(e), d.$parsers.push(e)), c.ngMinlength) {
                var k = H(c.ngMinlength),
                    e = function(a) {
                        return !S(a) && a.length < k ? (d.$setValidity("minlength", !1), p) : (d.$setValidity("minlength", !0), a)
                    };
                d.$parsers.push(e), d.$formatters.push(e)
            }
            if (c.ngMaxlength) {
                var l = H(c.ngMaxlength),
                    c = function(a) {
                        return !S(a) && a.length > l ? (d.$setValidity("maxlength", !1), p) : (d.$setValidity("maxlength", !0), a)
                    };
                d.$parsers.push(c), d.$formatters.push(c)
            }
        }

        function ib(b, a) {
            return b = "ngClass" + b, R(function(c, d, e) {
                c.$watch(e[b], function(b, e) {
                    (a === !0 || c.$index % 2 === a) && (e && b !== e && (J(e) && !K(e) && (e = Ta(e, function(a, b) {
                        return a ? b : void 0
                    })), d.removeClass(K(e) ? e.join(" ") : e)), J(b) && !K(b) && (b = Ta(b, function(a, b) {
                        return a ? b : void 0
                    })), b && d.addClass(K(b) ? b.join(" ") : b))
                }, !0)
            })
        }
        var u, ha, sa, Cb, C = function(b) {
                return G(b) ? b.toLowerCase() : b
            },
            la = function(b) {
                return G(b) ? b.toUpperCase() : b
            },
            z = T.Error,
            Z = H((/msie (\d+)/.exec(C(navigator.userAgent)) || [])[1]),
            ga = [].slice,
            Ra = [].push,
            Sa = Object.prototype.toString,
            Yb = T.angular || (T.angular = {}),
            Y = ["0", "0", "0"];
        x.$inject = [], ya.$inject = [], Cb = 9 > Z ? function(b) {
            return b = b.nodeName ? b : b[0], b.scopeName && "HTML" != b.scopeName ? la(b.scopeName + ":" + b.nodeName) : b.nodeName
        } : function(b) {
            return b.nodeName ? b.nodeName : b[0].nodeName
        };
        var jc = /[A-Z]/g,
            hd = {
                full: "1.0.1",
                major: 1,
                minor: 0,
                dot: 1,
                codeName: "thorium-shielding"
            },
            Ba = P.cache = {},
            Aa = P.expando = "ng-" + (new Date).getTime(),
            nc = 1,
            id = T.document.addEventListener ? function(b, a, c) {
                b.addEventListener(a, c, !1)
            } : function(b, a, c) {
                b.attachEvent("on" + a, c)
            },
            tb = T.document.removeEventListener ? function(b, a, c) {
                b.removeEventListener(a, c, !1)
            } : function(b, a, c) {
                b.detachEvent("on" + a, c)
            },
            lc = /([\:\-\_]+(.))/g,
            mc = /^moz([A-Z])/,
            ta = P.prototype = {
                ready: function(b) {
                    function a() {
                        c || (c = !0, b())
                    }
                    var c = !1;
                    this.bind("DOMContentLoaded", a), P(T).bind("load", a)
                },
                toString: function() {
                    var b = [];
                    return m(this, function(a) {
                        b.push("" + a)
                    }), "[" + b.join(", ") + "]"
                },
                eq: function(b) {
                    return u(b >= 0 ? this[b] : this[this.length + b])
                },
                length: 0,
                push: Ra,
                sort: [].sort,
                splice: [].splice
            },
            Ea = {};
        m("multiple,selected,checked,disabled,readOnly,required".split(","), function(b) {
            Ea[C(b)] = b
        });
        var zb = {};
        m("input,select,option,textarea,button,form".split(","), function(b) {
            zb[la(b)] = !0
        }), m({
            data: ub,
            inheritedData: Da,
            scope: function(b) {
                return Da(b, "$scope")
            },
            controller: xb,
            injector: function(b) {
                return Da(b, "$injector")
            },
            removeAttr: function(b, a) {
                b.removeAttribute(a)
            },
            hasClass: Ca,
            css: function(b, a, c) {
                if (a = qb(a), !s(c)) {
                    var d;
                    return 8 >= Z && (d = b.currentStyle && b.currentStyle[a], "" === d && (d = "auto")), d = d || b.style[a], 8 >= Z && (d = "" === d ? p : d), d
                }
                b.style[a] = c
            },
            attr: function(b, a, c) {
                var d = C(a);
                if (Ea[d]) {
                    if (!s(c)) return b[a] || (b.attributes.getNamedItem(a) || x).specified ? d : p;
                    c ? (b[a] = !0, b.setAttribute(a, d)) : (b[a] = !1, b.removeAttribute(d))
                } else if (s(c)) b.setAttribute(a, c);
                else if (b.getAttribute) return b = b.getAttribute(a, 2), null === b ? p : b
            },
            prop: function(b, a, c) {
                return s(c) ? void(b[a] = c) : b[a]
            },
            text: D(9 > Z ? function(b, a) {
                if (1 == b.nodeType) {
                    if (v(a)) return b.innerText;
                    b.innerText = a
                } else {
                    if (v(a)) return b.nodeValue;
                    b.nodeValue = a
                }
            } : function(b, a) {
                return v(a) ? b.textContent : void(b.textContent = a)
            }, {
                $dv: ""
            }),
            val: function(b, a) {
                return v(a) ? b.value : void(b.value = a)
            },
            html: function(b, a) {
                if (v(a)) return b.innerHTML;
                for (var c = 0, d = b.childNodes; c < d.length; c++) ra(d[c]);
                b.innerHTML = a
            }
        }, function(b, a) {
            P.prototype[a] = function(a, d) {
                var e, g;
                if ((2 == b.length && b !== Ca && b !== xb ? a : d) !== p) {
                    for (e = 0; e < this.length; e++) b(this[e], a, d);
                    return this
                }
                if (J(a)) {
                    for (e = 0; e < this.length; e++)
                        if (b === ub) b(this[e], a);
                        else
                            for (g in a) b(this[e], g, a[g]);
                    return this
                }
                return this.length ? b(this[0], a, d) : b.$dv
            }
        }), m({
            removeData: rb,
            dealoc: ra,
            bind: function a(c, d, e) {
                var g = ca(c, "events"),
                    h = ca(c, "handle");
                g || ca(c, "events", g = {}), h || ca(c, "handle", h = oc(c, g)), m(d.split(" "), function(d) {
                    var i = g[d];
                    if (!i) {
                        if ("mouseenter" == d || "mouseleave" == d) {
                            var j = 0;
                            g.mouseenter = [], g.mouseleave = [], a(c, "mouseover", function(a) {
                                j++, 1 == j && h(a, "mouseenter")
                            }), a(c, "mouseout", function(a) {
                                j--, 0 == j && h(a, "mouseleave")
                            })
                        } else id(c, d, h), g[d] = [];
                        i = g[d]
                    }
                    i.push(e)
                })
            },
            unbind: sb,
            replaceWith: function(a, c) {
                var d, e = a.parentNode;
                ra(a), m(new P(c), function(c) {
                    d ? e.insertBefore(c, d.nextSibling) : e.replaceChild(c, a), d = c
                })
            },
            children: function(a) {
                var c = [];
                return m(a.childNodes, function(a) {
                    "#text" != a.nodeName && c.push(a)
                }), c
            },
            contents: function(a) {
                return a.childNodes
            },
            append: function(a, c) {
                m(new P(c), function(c) {
                    1 === a.nodeType && a.appendChild(c)
                })
            },
            prepend: function(a, c) {
                if (1 === a.nodeType) {
                    var d = a.firstChild;
                    m(new P(c), function(c) {
                        d ? a.insertBefore(c, d) : (a.appendChild(c), d = c)
                    })
                }
            },
            wrap: function(a, c) {
                var c = u(c)[0],
                    d = a.parentNode;
                d && d.replaceChild(c, a), c.appendChild(a)
            },
            remove: function(a) {
                ra(a);
                var c = a.parentNode;
                c && c.removeChild(a)
            },
            after: function(a, c) {
                var d = a,
                    e = a.parentNode;
                m(new P(c), function(a) {
                    e.insertBefore(a, d.nextSibling), d = a
                })
            },
            addClass: wb,
            removeClass: vb,
            toggleClass: function(a, c, d) {
                v(d) && (d = !Ca(a, c)), (d ? wb : vb)(a, c)
            },
            parent: function(a) {
                return (a = a.parentNode) && 11 !== a.nodeType ? a : null
            },
            next: function(a) {
                return a.nextSibling
            },
            find: function(a, c) {
                return a.getElementsByTagName(c)
            },
            clone: cb
        }, function(a, c) {
            P.prototype[c] = function(c, e) {
                for (var g, h = 0; h < this.length; h++) g == p ? (g = a(this[h], c, e), g !== p && (g = u(g))) : bb(g, a(this[h], c, e));
                return g == p ? this : g
            }
        }), Fa.prototype = {
            put: function(a, c) {
                this[ia(a)] = c
            },
            get: function(a) {
                return this[ia(a)]
            },
            remove: function(a) {
                var c = this[a = ia(a)];
                return delete this[a], c
            }
        }, db.prototype = {
            push: function(a, c) {
                var d = this[a = ia(a)];
                d ? d.push(c) : this[a] = [c]
            },
            shift: function(a) {
                var c = this[a = ia(a)];
                return c ? 1 == c.length ? (delete this[a], c[0]) : c.shift() : void 0
            }
        };
        var qc = /^function\s*[^\(]*\(\s*([^\)]*)\)/m,
            rc = /,/,
            sc = /^\s*(_?)(.+?)\1\s*$/,
            pc = /((\/\/.*$)|(\/\*[\s\S]*?\*\/))/gm,
            Db = "Non-assignable model expression: ";
        Bb.$inject = ["$provide"];
        var zc = /^(x[\:\-_]|data[\:\-_])/i,
            Fb = /^([^:]+):\/\/(\w+:{0,1}\w*@)?([\w\.-]*)(:([0-9]+))?(\/[^\?#]*)?(\?([^#]*))?(#(.*))?$/,
            Zb = /^([^\?#]*)?(\?([^#]*))?(#(.*))?$/,
            Gc = Zb,
            Gb = {
                http: 80,
                https: 443,
                ftp: 21
            };
        fb.prototype = {
            $$replace: !1,
            absUrl: Ja("$$absUrl"),
            url: function(a, c) {
                if (v(a)) return this.$$url;
                var d = Zb.exec(a);
                return d[1] && this.path(decodeURIComponent(d[1])), (d[2] || d[1]) && this.search(d[3] || ""), this.hash(d[5] || "", c), this
            },
            protocol: Ja("$$protocol"),
            host: Ja("$$host"),
            port: Ja("$$port"),
            path: Ib("$$path", function(a) {
                return "/" == a.charAt(0) ? a : "/" + a
            }),
            search: function(a, c) {
                return v(a) ? this.$$search : (s(c) ? null === c ? delete this.$$search[a] : this.$$search[a] = c : this.$$search = G(a) ? Xa(a) : a, this.$$compose(), this)
            },
            hash: Ib("$$hash", ya),
            replace: function() {
                return this.$$replace = !0, this
            }
        }, Ia.prototype = xa(fb.prototype), Hb.prototype = xa(Ia.prototype);
        var Ka = {
                "null": function() {
                    return null
                },
                "true": function() {
                    return !0
                },
                "false": function() {
                    return !1
                },
                undefined: x,
                "+": function(a, c, d, e) {
                    return d = d(a, c), e = e(a, c), (s(d) ? d : 0) + (s(e) ? e : 0)
                },
                "-": function(a, c, d, e) {
                    return d = d(a, c), e = e(a, c), (s(d) ? d : 0) - (s(e) ? e : 0)
                },
                "*": function(a, c, d, e) {
                    return d(a, c) * e(a, c)
                },
                "/": function(a, c, d, e) {
                    return d(a, c) / e(a, c)
                },
                "%": function(a, c, d, e) {
                    return d(a, c) % e(a, c)
                },
                "^": function(a, c, d, e) {
                    return d(a, c) ^ e(a, c)
                },
                "=": x,
                "==": function(a, c, d, e) {
                    return d(a, c) == e(a, c)
                },
                "!=": function(a, c, d, e) {
                    return d(a, c) != e(a, c)
                },
                "<": function(a, c, d, e) {
                    return d(a, c) < e(a, c)
                },
                ">": function(a, c, d, e) {
                    return d(a, c) > e(a, c)
                },
                "<=": function(a, c, d, e) {
                    return d(a, c) <= e(a, c)
                },
                ">=": function(a, c, d, e) {
                    return d(a, c) >= e(a, c)
                },
                "&&": function(a, c, d, e) {
                    return d(a, c) && e(a, c)
                },
                "||": function(a, c, d, e) {
                    return d(a, c) || e(a, c)
                },
                "&": function(a, c, d, e) {
                    return d(a, c) & e(a, c)
                },
                "|": function(a, c, d, e) {
                    return e(a, c)(a, c, d(a, c))
                },
                "!": function(a, c, d) {
                    return !d(a, c)
                }
            },
            Kc = {
                n: "\n",
                f: "\f",
                r: "\r",
                t: "    ",
                v: "",
                "'": "'",
                '"': '"'
            },
            gb = {},
            Xc = T.XMLHttpRequest || function() {
                try {
                    return new ActiveXObject("Msxml2.XMLHTTP.6.0")
                } catch (a) {}
                try {
                    return new ActiveXObject("Msxml2.XMLHTTP.3.0")
                } catch (c) {}
                try {
                    return new ActiveXObject("Msxml2.XMLHTTP")
                } catch (d) {}
                throw new z("This browser does not support XMLHttpRequest.")
            };
        Pb.$inject = ["$provide"], Qb.$inject = ["$locale"], Sb.$inject = ["$locale"];
        var Vb = ".",
            gd = {
                yyyy: O("FullYear", 4),
                yy: O("FullYear", 2, 0, !0),
                y: O("FullYear", 1),
                MMMM: La("Month"),
                MMM: La("Month", !0),
                MM: O("Month", 2, 1),
                M: O("Month", 1, 1),
                dd: O("Date", 2),
                d: O("Date", 1),
                HH: O("Hours", 2),
                H: O("Hours", 1),
                hh: O("Hours", 2, -12),
                h: O("Hours", 1, -12),
                mm: O("Minutes", 2),
                m: O("Minutes", 1),
                ss: O("Seconds", 2),
                s: O("Seconds", 1),
                EEEE: La("Day"),
                EEE: La("Day", !0),
                a: function(a, c) {
                    return a.getHours() < 12 ? c.AMPMS[0] : c.AMPMS[1]
                },
                Z: function(a) {
                    return a = a.getTimezoneOffset(), hb(a / 60, 2) + hb(Math.abs(a % 60), 2)
                }
            },
            fd = /((?:[^yMdHhmsaZE']+)|(?:'(?:[^']|'')*')|(?:E+|y+|M+|d+|H+|h+|m+|s+|a|Z))(.*)/,
            ed = /^\d+$/;
        Rb.$inject = ["$locale"];
        var cd = B(C),
            dd = B(la);
        Tb.$inject = ["$parse"];
        var jd = B({
                restrict: "E",
                compile: function(a, c) {
                    return c.href || c.$set("href", ""),
                        function(a, c) {
                            c.bind("click", function(a) {
                                c.attr("href") || a.preventDefault()
                            })
                        }
                }
            }),
            jb = {};
        m(Ea, function(a, c) {
            var d = ea("ng-" + c);
            jb[d] = function() {
                return {
                    priority: 100,
                    compile: function() {
                        return function(a, g, h) {
                            a.$watch(h[d], function(a) {
                                h.$set(c, !!a)
                            })
                        }
                    }
                }
            }
        }), m(["src", "href"], function(a) {
            var c = ea("ng-" + a);
            jb[c] = function() {
                return {
                    priority: 99,
                    link: function(d, e, g) {
                        g.$observe(c, function(c) {
                            g.$set(a, c), Z && e.prop(a, c)
                        })
                    }
                }
            }
        });
        var Oa = {
            $addControl: x,
            $removeControl: x,
            $setValidity: x,
            $setDirty: x
        };
        Wb.$inject = ["$element", "$attrs", "$scope"];
        var Ra = {
                name: "form",
                restrict: "E",
                controller: Wb,
                compile: function() {
                    return {
                        pre: function(a, c, d, e) {
                            d.action || c.bind("submit", function(a) {
                                a.preventDefault()
                            });
                            var g = c.parent().controller("form"),
                                h = d.name || d.ngForm;
                            h && (a[h] = e), g && c.bind("$destroy", function() {
                                g.$removeControl(e), h && (a[h] = p), D(e, Oa)
                            })
                        }
                    }
                }
            },
            kd = B(Ra),
            ld = B(D(U(Ra), {
                restrict: "EAC"
            })),
            md = /^(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$/,
            nd = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/,
            od = /^\s*(\-|\+)?(\d+|(\d*(\.\d*)))\s*$/,
            $b = {
                text: Qa,
                number: function(a, c, d, e, g, h) {
                    if (Qa(a, c, d, e, g, h), e.$parsers.push(function(a) {
                            var c = S(a);
                            return c || od.test(a) ? (e.$setValidity("number", !0), "" === a ? null : c ? a : parseFloat(a)) : (e.$setValidity("number", !1), p)
                        }), e.$formatters.push(function(a) {
                            return S(a) ? "" : "" + a
                        }), d.min) {
                        var f = parseFloat(d.min),
                            a = function(a) {
                                return !S(a) && f > a ? (e.$setValidity("min", !1), p) : (e.$setValidity("min", !0), a)
                            };
                        e.$parsers.push(a), e.$formatters.push(a)
                    }
                    if (d.max) {
                        var i = parseFloat(d.max),
                            d = function(a) {
                                return !S(a) && a > i ? (e.$setValidity("max", !1), p) : (e.$setValidity("max", !0), a)
                            };
                        e.$parsers.push(d), e.$formatters.push(d)
                    }
                    e.$formatters.push(function(a) {
                        return S(a) || va(a) ? (e.$setValidity("number", !0), a) : (e.$setValidity("number", !1), p)
                    })
                },
                url: function(a, c, d, e, g, h) {
                    Qa(a, c, d, e, g, h), a = function(a) {
                        return S(a) || md.test(a) ? (e.$setValidity("url", !0), a) : (e.$setValidity("url", !1), p)
                    }, e.$formatters.push(a), e.$parsers.push(a)
                },
                email: function(a, c, d, e, g, h) {
                    Qa(a, c, d, e, g, h), a = function(a) {
                        return S(a) || nd.test(a) ? (e.$setValidity("email", !0), a) : (e.$setValidity("email", !1), p)
                    }, e.$formatters.push(a), e.$parsers.push(a)
                },
                radio: function(a, c, d, e) {
                    v(d.name) && c.attr("name", wa()), c.bind("click", function() {
                        c[0].checked && a.$apply(function() {
                            e.$setViewValue(d.value)
                        })
                    }), e.$render = function() {
                        c[0].checked = d.value == e.$viewValue
                    }, d.$observe("value", e.$render)
                },
                checkbox: function(a, c, d, e) {
                    var g = d.ngTrueValue,
                        h = d.ngFalseValue;
                    G(g) || (g = !0), G(h) || (h = !1), c.bind("click", function() {
                        a.$apply(function() {
                            e.$setViewValue(c[0].checked)
                        })
                    }), e.$render = function() {
                        c[0].checked = e.$viewValue
                    }, e.$formatters.push(function(a) {
                        return a === g
                    }), e.$parsers.push(function(a) {
                        return a ? g : h
                    })
                },
                hidden: x,
                button: x,
                submit: x,
                reset: x
            },
            ac = ["$browser", "$sniffer", function(a, c) {
                return {
                    restrict: "E",
                    require: "?ngModel",
                    link: function(d, e, g, h) {
                        h && ($b[C(g.type)] || $b.text)(d, e, g, h, c, a)
                    }
                }
            }],
            Na = "ng-valid",
            Ma = "ng-invalid",
            Pa = "ng-pristine",
            Xb = "ng-dirty",
            pd = ["$scope", "$exceptionHandler", "$attrs", "$element", "$parse", function(a, c, d, e, g) {
                function h(a, c) {
                    c = c ? "-" + $a(c, "-") : "", e.removeClass((a ? Ma : Na) + c).addClass((a ? Na : Ma) + c)
                }
                this.$modelValue = this.$viewValue = Number.NaN, this.$parsers = [], this.$formatters = [], this.$viewChangeListeners = [], this.$pristine = !0, this.$dirty = !1, this.$valid = !0, this.$invalid = !1, this.$name = d.name;
                var g = g(d.ngModel),
                    f = g.assign;
                if (!f) throw z(Db + d.ngModel + " (" + oa(e) + ")");
                this.$render = x;
                var i = e.inheritedData("$formController") || Oa,
                    j = 0,
                    k = this.$error = {};
                e.addClass(Pa), h(!0), this.$setValidity = function(a, c) {
                    k[a] !== !c && (c ? (k[a] && j--, j || (h(!0), this.$valid = !0, this.$invalid = !1)) : (h(!1), this.$invalid = !0, this.$valid = !1, j++), k[a] = !c, h(c, a), i.$setValidity(a, c, this))
                }, this.$setViewValue = function(d) {
                    this.$viewValue = d, this.$pristine && (this.$dirty = !0, this.$pristine = !1, e.removeClass(Pa).addClass(Xb), i.$setDirty()), m(this.$parsers, function(a) {
                        d = a(d)
                    }), this.$modelValue !== d && (this.$modelValue = d, f(a, d), m(this.$viewChangeListeners, function(a) {
                        try {
                            a()
                        } catch (d) {
                            c(d)
                        }
                    }))
                };
                var l = this;
                a.$watch(g, function(a) {
                    if (l.$modelValue !== a) {
                        var c = l.$formatters,
                            d = c.length;
                        for (l.$modelValue = a; d--;) a = c[d](a);
                        l.$viewValue !== a && (l.$viewValue = a, l.$render())
                    }
                })
            }],
            qd = function() {
                return {
                    require: ["ngModel", "^?form"],
                    controller: pd,
                    link: function(a, c, d, e) {
                        var g = e[0],
                            h = e[1] || Oa;
                        h.$addControl(g), c.bind("$destroy", function() {
                            h.$removeControl(g)
                        })
                    }
                }
            },
            rd = B({
                require: "ngModel",
                link: function(a, c, d, e) {
                    e.$viewChangeListeners.push(function() {
                        a.$eval(d.ngChange)
                    })
                }
            }),
            bc = function() {
                return {
                    require: "?ngModel",
                    link: function(a, c, d, e) {
                        if (e) {
                            d.required = !0;
                            var g = function(a) {
                                return !d.required || !S(a) && a !== !1 ? (e.$setValidity("required", !0), a) : void e.$setValidity("required", !1)
                            };
                            e.$formatters.push(g), e.$parsers.unshift(g), d.$observe("required", function() {
                                g(e.$viewValue)
                            })
                        }
                    }
                }
            },
            sd = function() {
                return {
                    require: "ngModel",
                    link: function(a, c, d, e) {
                        var g = (a = /\/(.*)\//.exec(d.ngList)) && RegExp(a[1]) || d.ngList || ",",
                            h = function(a) {
                                var c = [];
                                return a && m(a.split(g), function(a) {
                                    a && c.push(Q(a))
                                }), c
                            };
                        e.$parsers.push(h), e.$formatters.push(function(a) {
                            return K(a) && !fa(h(e.$viewValue), a) ? a.join(", ") : p
                        })
                    }
                }
            },
            td = /^(true|false|\d+)$/,
            ud = function() {
                return {
                    priority: 100,
                    compile: function(a, c) {
                        return td.test(c.ngValue) ? function(a, c, g) {
                            g.$set("value", a.$eval(g.ngValue))
                        } : function(a, c, g) {
                            a.$watch(g.ngValue, function(a) {
                                g.$set("value", a, !1)
                            })
                        }
                    }
                }
            },
            vd = R(function(a, c, d) {
                c.addClass("ng-binding").data("$binding", d.ngBind), a.$watch(d.ngBind, function(a) {
                    c.text(a == p ? "" : a)
                })
            }),
            wd = ["$interpolate", function(a) {
                return function(c, d, e) {
                    c = a(d.attr(e.$attr.ngBindTemplate)), d.addClass("ng-binding").data("$binding", c), e.$observe("ngBindTemplate", function(a) {
                        d.text(a)
                    })
                }
            }],
            xd = [function() {
                return function(a, c, d) {
                    c.addClass("ng-binding").data("$binding", d.ngBindHtmlUnsafe), a.$watch(d.ngBindHtmlUnsafe, function(a) {
                        c.html(a || "")
                    })
                }
            }],
            yd = ib("", !0),
            zd = ib("Odd", 0),
            Ad = ib("Even", 1),
            Bd = R({
                compile: function(a, c) {
                    c.$set("ngCloak", p), a.removeClass("ng-cloak")
                }
            }),
            Cd = [function() {
                return {
                    scope: !0,
                    controller: "@"
                }
            }],
            Dd = ["$sniffer", function(a) {
                return {
                    priority: 1e3,
                    compile: function() {
                        a.csp = !0
                    }
                }
            }],
            cc = {};
        m("click dblclick mousedown mouseup mouseover mouseout mousemove mouseenter mouseleave".split(" "), function(a) {
            var c = ea("ng-" + a);
            cc[c] = ["$parse", function(d) {
                return function(e, g, h) {
                    var f = d(h[c]);
                    g.bind(C(a), function(a) {
                        e.$apply(function() {
                            f(e, {
                                $event: a
                            })
                        })
                    })
                }
            }]
        });
        var Ed = R(function(a, c, d) {
                c.bind("submit", function() {
                    a.$apply(d.ngSubmit)
                })
            }),
            Fd = ["$http", "$templateCache", "$anchorScroll", "$compile", function(a, c, d, e) {
                return {
                    restrict: "ECA",
                    terminal: !0,
                    compile: function(g, h) {
                        var f = h.ngInclude || h.src,
                            i = h.onload || "",
                            j = h.autoscroll;
                        return function(g, h) {
                            var m, n = 0,
                                o = function() {
                                    m && (m.$destroy(), m = null), h.html("")
                                };
                            g.$watch(f, function(f) {
                                var q = ++n;
                                f ? a.get(f, {
                                    cache: c
                                }).success(function(a) {
                                    q === n && (m && m.$destroy(), m = g.$new(), h.html(a), e(h.contents())(m), s(j) && (!j || g.$eval(j)) && d(), m.$emit("$includeContentLoaded"), g.$eval(i))
                                }).error(function() {
                                    q === n && o()
                                }) : o()
                            })
                        }
                    }
                }
            }],
            Gd = R({
                compile: function() {
                    return {
                        pre: function(a, c, d) {
                            a.$eval(d.ngInit)
                        }
                    }
                }
            }),
            Hd = R({
                terminal: !0,
                priority: 1e3
            }),
            Id = ["$locale", "$interpolate", function(a, c) {
                var d = /{}/g;
                return {
                    restrict: "EA",
                    link: function(e, g, h) {
                        var f = h.count,
                            i = g.attr(h.$attr.when),
                            j = h.offset || 0,
                            k = e.$eval(i),
                            l = {};
                        m(k, function(a, e) {
                            l[e] = c(a.replace(d, "{{" + f + "-" + j + "}}"))
                        }), e.$watch(function() {
                            var c = parseFloat(e.$eval(f));
                            return isNaN(c) ? "" : (k[c] || (c = a.pluralCat(c - j)), l[c](e, g, !0))
                        }, function(a) {
                            g.text(a)
                        })
                    }
                }
            }],
            Jd = R({
                transclude: "element",
                priority: 1e3,
                terminal: !0,
                compile: function(a, c, d) {
                    return function(a, c, h) {
                        var i, j, k, f = h.ngRepeat,
                            h = f.match(/^\s*(.+)\s+in\s+(.*)\s*$/);
                        if (!h) throw z("Expected ngRepeat in form of '_item_ in _collection_' but got '" + f + "'.");
                        if (f = h[1], i = h[2], h = f.match(/^(?:([\$\w]+)|\(([\$\w]+)\s*,\s*([\$\w]+)\))$/), !h) throw z("'item' in 'item in collection' should be identifier or (key, value) but got '" + f + "'.");
                        j = h[3] || h[1], k = h[2];
                        var l = new db;
                        a.$watch(function(a) {
                            var e, f, p, A, y, v, s, h = a.$eval(i),
                                m = fc(h, !0),
                                u = new db,
                                z = c;
                            if (K(h)) v = h || [];
                            else {
                                v = [];
                                for (A in h) h.hasOwnProperty(A) && "$" != A.charAt(0) && v.push(A);
                                v.sort()
                            }
                            for (e = 0, f = v.length; f > e; e++) A = h === v ? e : v[e], y = h[A], (s = l.shift(y)) ? (p = s.scope, u.push(y, s), e !== s.index && (s.index = e, z.after(s.element)), z = s.element) : p = a.$new(), p[j] = y, k && (p[k] = A), p.$index = e, p.$first = 0 === e, p.$last = e === m - 1, p.$middle = !(p.$first || p.$last), s || d(p, function(a) {
                                z.after(a), s = {
                                    scope: p,
                                    element: z = a,
                                    index: e
                                }, u.push(y, s)
                            });
                            for (A in l)
                                if (l.hasOwnProperty(A))
                                    for (v = l[A]; v.length;) y = v.pop(), y.element.remove(), y.scope.$destroy();
                            l = u
                        })
                    }
                }
            }),
            Kd = R(function(a, c, d) {
                a.$watch(d.ngShow, function(a) {
                    c.css("display", Wa(a) ? "" : "none")
                })
            }),
            Ld = R(function(a, c, d) {
                a.$watch(d.ngHide, function(a) {
                    c.css("display", Wa(a) ? "none" : "")
                })
            }),
            Md = R(function(a, c, d) {
                a.$watch(d.ngStyle, function(a, d) {
                    d && a !== d && m(d, function(a, d) {
                        c.css(d, "")
                    }), a && c.css(a)
                }, !0)
            }),
            Nd = B({
                restrict: "EA",
                compile: function(a, c) {
                    var d = c.ngSwitch || c.on,
                        e = {};
                    return a.data("ng-switch", e),
                        function(a, h) {
                            var f, i, j;
                            a.$watch(d, function(d) {
                                i && (j.$destroy(), i.remove(), i = j = null), (f = e["!" + d] || e["?"]) && (a.$eval(c.change), j = a.$new(), f(j, function(a) {
                                    i = a, h.append(a)
                                }))
                            })
                        }
                }
            }),
            Od = R({
                transclude: "element",
                priority: 500,
                compile: function(a, c, d) {
                    a = a.inheritedData("ng-switch"), pa(a), a["!" + c.ngSwitchWhen] = d
                }
            }),
            Pd = R({
                transclude: "element",
                priority: 500,
                compile: function(a, c, d) {
                    a = a.inheritedData("ng-switch"), pa(a), a["?"] = d
                }
            }),
            Qd = R({
                controller: ["$transclude", "$element", function(a, c) {
                    a(function(a) {
                        c.append(a)
                    })
                }]
            }),
            Rd = ["$http", "$templateCache", "$route", "$anchorScroll", "$compile", "$controller", function(a, c, d, e, g, h) {
                return {
                    restrict: "ECA",
                    terminal: !0,
                    link: function(a, c, j) {
                        function k() {
                            var j = d.current && d.current.locals,
                                k = j && j.$template;
                            if (k) {
                                c.html(k), l && (l.$destroy(), l = null);
                                var k = g(c.contents()),
                                    m = d.current;
                                l = m.scope = a.$new(), m.controller && (j.$scope = l, j = h(m.controller, j), c.contents().data("$ngControllerController", j)), k(l), l.$emit("$viewContentLoaded"), l.$eval(n), e()
                            } else c.html(""), l && (l.$destroy(), l = null)
                        }
                        var l, n = j.onload || "";
                        a.$on("$routeChangeSuccess", k), k()
                    }
                }
            }],
            Sd = ["$templateCache", function(a) {
                return {
                    restrict: "E",
                    terminal: !0,
                    compile: function(c, d) {
                        "text/ng-template" == d.type && a.put(d.id, c[0].text)
                    }
                }
            }],
            Td = B({
                terminal: !0
            }),
            Ud = ["$compile", "$parse", function(a, c) {
                var d = /^\s*(.*?)(?:\s+as\s+(.*?))?(?:\s+group\s+by\s+(.*))?\s+for\s+(?:([\$\w][\$\w\d]*)|(?:\(\s*([\$\w][\$\w\d]*)\s*,\s*([\$\w][\$\w\d]*)\s*\)))\s+in\s+(.*)$/,
                    e = {
                        $setViewValue: x
                    };
                return {
                    restrict: "E",
                    require: ["select", "?ngModel"],
                    controller: ["$element", "$scope", "$attrs", function(a, c, d) {
                        var l, i = this,
                            j = {},
                            k = e;
                        i.databound = d.ngModel, i.init = function(a, c, d) {
                            k = a, l = d
                        }, i.addOption = function(c) {
                            j[c] = !0, k.$viewValue == c && (a.val(c), l.parent() && l.remove())
                        }, i.removeOption = function(a) {
                            this.hasOption(a) && (delete j[a], k.$viewValue == a && this.renderUnknownOption(a))
                        }, i.renderUnknownOption = function(c) {
                            c = "? " + ia(c) + " ?", l.val(c), a.prepend(l), a.val(c), l.prop("selected", !0)
                        }, i.hasOption = function(a) {
                            return j.hasOwnProperty(a)
                        }, c.$on("$destroy", function() {
                            i.renderUnknownOption = x
                        })
                    }],
                    link: function(e, h, f, i) {
                        function j(a, c, d, e) {
                            d.$render = function() {
                                var a = d.$viewValue;
                                e.hasOption(a) ? (y.parent() && y.remove(), c.val(a), "" === a && t.prop("selected", !0)) : v(a) && t ? c.val("") : e.renderUnknownOption(a)
                            }, c.bind("change", function() {
                                a.$apply(function() {
                                    y.parent() && y.remove(), d.$setViewValue(c.val())
                                })
                            })
                        }

                        function k(a, c, d) {
                            var e;
                            d.$render = function() {
                                var a = new Fa(d.$viewValue);
                                m(c.children(), function(c) {
                                    c.selected = s(a.get(c.value))
                                })
                            }, a.$watch(function() {
                                fa(e, d.$viewValue) || (e = U(d.$viewValue), d.$render())
                            }), c.bind("change", function() {
                                a.$apply(function() {
                                    var a = [];
                                    m(c.children(), function(c) {
                                        c.selected && a.push(c.value)
                                    }), d.$setViewValue(a)
                                })
                            })
                        }

                        function l(e, f, g) {
                            function i() {
                                var d, h, s, u, t, a = {
                                        "": []
                                    },
                                    c = [""];
                                s = g.$modelValue, u = r(e) || [];
                                var z, w, x, y = l ? kb(u) : u;
                                w = {}, t = !1;
                                var B, C;
                                for (o ? t = new Fa(s) : (null === s || q) && (a[""].push({
                                        selected: null === s,
                                        id: "",
                                        label: ""
                                    }), t = !0), x = 0; z = y.length, z > x; x++) w[k] = u[l ? w[l] = y[x] : x], d = m(e, w) || "", (h = a[d]) || (h = a[d] = [], c.push(d)), o ? d = t.remove(n(e, w)) != p : (d = s === n(e, w), t = t || d), h.push({
                                    id: l ? y[x] : x,
                                    label: j(e, w) || "",
                                    selected: d
                                });
                                for (!o && !t && a[""].unshift({
                                        id: "?",
                                        label: "",
                                        selected: !0
                                    }), w = 0, y = c.length; y > w; w++) {
                                    for (d = c[w], h = a[d], v.length <= w ? (s = {
                                            element: A.clone().attr("label", d),
                                            label: h.label
                                        }, u = [s], v.push(u), f.append(s.element)) : (u = v[w], s = u[0], s.label != d && s.element.attr("label", s.label = d)), B = null, x = 0, z = h.length; z > x; x++) d = h[x], (t = u[x + 1]) ? (B = t.element, t.label !== d.label && B.text(t.label = d.label), t.id !== d.id && B.val(t.id = d.id), t.element.selected !== d.selected && B.prop("selected", t.selected = d.selected)) : ("" === d.id && q ? C = q : (C = D.clone()).val(d.id).attr("selected", d.selected).text(d.label), u.push({
                                        element: C,
                                        label: d.label,
                                        id: d.id,
                                        selected: d.selected
                                    }), B ? B.after(C) : s.element.append(C), B = C);
                                    for (x++; u.length > x;) u.pop().element.remove()
                                }
                                for (; v.length > w;) v.pop()[0].element.remove()
                            }
                            var h;
                            if (!(h = w.match(d))) throw z("Expected ngOptions in form of '_select_ (as _label_)? for (_key_,)?_value_ in _collection_' but got '" + w + "'.");
                            var j = c(h[2] || h[1]),
                                k = h[4] || h[6],
                                l = h[5],
                                m = c(h[3] || ""),
                                n = c(h[2] ? h[1] : k),
                                r = c(h[7]),
                                v = [
                                    [{
                                        element: f,
                                        label: ""
                                    }]
                                ];
                            q && (a(q)(e), q.removeClass("ng-scope"), q.remove()), f.html(""), f.bind("change", function() {
                                e.$apply(function() {
                                    var a, h, i, j, m, q, s, c = r(e) || [],
                                        d = {};
                                    if (o)
                                        for (i = [], m = 0, s = v.length; s > m; m++)
                                            for (a = v[m], j = 1, q = a.length; q > j; j++)(h = a[j].element)[0].selected && (h = h.val(), l && (d[l] = h), d[k] = c[h], i.push(n(e, d)));
                                    else h = f.val(), "?" == h ? i = p : "" == h ? i = null : (d[k] = c[h], l && (d[l] = h), i = n(e, d));
                                    g.$setViewValue(i)
                                })
                            }), g.$render = i, e.$watch(i)
                        }
                        if (i[1]) {
                            for (var t, n = i[0], r = i[1], o = f.multiple, w = f.ngOptions, q = !1, D = u(aa.createElement("option")), A = u(aa.createElement("optgroup")), y = D.clone(), i = 0, x = h.children(), B = x.length; B > i; i++)
                                if ("" == x[i].value) {
                                    t = q = x.eq(i);
                                    break
                                }
                            if (n.init(r, q, y), o && (f.required || f.ngRequired)) {
                                var C = function(a) {
                                    return r.$setValidity("required", !f.required || a && a.length), a
                                };
                                r.$parsers.push(C), r.$formatters.unshift(C), f.$observe("required", function() {
                                    C(r.$viewValue)
                                })
                            }
                            w ? l(e, h, r) : o ? k(e, h, r) : j(e, h, r, n)
                        }
                    }
                }
            }],
            Vd = ["$interpolate", function(a) {
                var c = {
                    addOption: x,
                    removeOption: x
                };
                return {
                    restrict: "E",
                    priority: 100,
                    require: "^select",
                    compile: function(d, e) {
                        if (v(e.value)) {
                            var g = a(d.text(), !0);
                            g || e.$set("value", d.text())
                        }
                        return function(a, d, e, j) {
                            j.databound ? d.prop("selected", !1) : j = c, g ? a.$watch(g, function(a, c) {
                                e.$set("value", a), a !== c && j.removeOption(c), j.addOption(a)
                            }) : j.addOption(e.value), d.bind("$destroy", function() {
                                j.removeOption(e.value)
                            })
                        }
                    }
                }
            }],
            Wd = B({
                restrict: "E",
                terminal: !0
            });
        (ha = T.jQuery) ? (u = ha, D(ha.fn, {
            scope: ta.scope,
            controller: ta.controller,
            injector: ta.injector,
            inheritedData: ta.inheritedData
        }), ab("remove", !0), ab("empty"), ab("html")) : u = P, Yb.element = u,
            function(a) {
                D(a, {
                    bootstrap: ob,
                    copy: U,
                    extend: D,
                    equals: fa,
                    element: u,
                    forEach: m,
                    injector: pb,
                    noop: x,
                    bind: Va,
                    toJson: ba,
                    fromJson: mb,
                    identity: ya,
                    isUndefined: v,
                    isDefined: s,
                    isString: G,
                    isFunction: M,
                    isObject: J,
                    isNumber: va,
                    isElement: ec,
                    isArray: K,
                    version: hd,
                    isDate: ma,
                    lowercase: C,
                    uppercase: la,
                    callbacks: {
                        counter: 0
                    }
                }), sa = kc(T);
                try {
                    sa("ngLocale")
                } catch (c) {
                    sa("ngLocale", []).provider("$locale", Yc)
                }
                sa("ng", ["ngLocale"], ["$provide", function(a) {
                    a.provider("$compile", Bb).directive({
                        a: jd,
                        input: ac,
                        textarea: ac,
                        form: kd,
                        script: Sd,
                        select: Ud,
                        style: Wd,
                        option: Vd,
                        ngBind: vd,
                        ngBindHtmlUnsafe: xd,
                        ngBindTemplate: wd,
                        ngClass: yd,
                        ngClassEven: Ad,
                        ngClassOdd: zd,
                        ngCsp: Dd,
                        ngCloak: Bd,
                        ngController: Cd,
                        ngForm: ld,
                        ngHide: Ld,
                        ngInclude: Fd,
                        ngInit: Gd,
                        ngNonBindable: Hd,
                        ngPluralize: Id,
                        ngRepeat: Jd,
                        ngShow: Kd,
                        ngSubmit: Ed,
                        ngStyle: Md,
                        ngSwitch: Nd,
                        ngSwitchWhen: Od,
                        ngSwitchDefault: Pd,
                        ngOptions: Td,
                        ngView: Rd,
                        ngTransclude: Qd,
                        ngModel: qd,
                        ngList: sd,
                        ngChange: rd,
                        required: bc,
                        ngRequired: bc,
                        ngValue: ud
                    }).directive(jb).directive(cc), a.provider({
                        $anchorScroll: tc,
                        $browser: vc,
                        $cacheFactory: wc,
                        $controller: Ac,
                        $document: Bc,
                        $exceptionHandler: Cc,
                        $filter: Pb,
                        $interpolate: Dc,
                        $http: Uc,
                        $httpBackend: Vc,
                        $location: Hc,
                        $log: Ic,
                        $parse: Mc,
                        $route: Pc,
                        $routeParams: Qc,
                        $rootScope: Rc,
                        $q: Nc,
                        $sniffer: Sc,
                        $templateCache: xc,
                        $timeout: Zc,
                        $window: Tc
                    })
                }])
            }(Yb), u(aa).ready(function() {
                ic(aa, ob)
            })
    }(window, document), angular.element(document).find("head").append('<style type="text/css">@charset "UTF-8";[ng\\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak{display:none;}ng\\:form{display:block;}</style>'),
    function(A, f, u) {
        "use strict";
        f.module("ngResource", ["ng"]).factory("$resource", ["$http", "$parse", function(v, w) {
            function g(b, c) {
                return encodeURIComponent(b).replace(/%40/gi, "@").replace(/%3A/gi, ":").replace(/%24/g, "$").replace(/%2C/gi, ",").replace(c ? null : /%20/g, "+")
            }

            function l(b, c) {
                this.template = b += "#", this.defaults = c || {};
                var a = this.urlParams = {};
                j(b.split(/\W/), function(c) {
                    c && b.match(RegExp("[^\\\\]:" + c + "\\W")) && (a[c] = !0)
                }), this.template = b.replace(/\\:/g, ":")
            }

            function s(b, c, a) {
                function f(d) {
                    var b = {};
                    return j(c || {}, function(a, x) {
                        var m;
                        a.charAt && "@" == a.charAt(0) ? (m = a.substr(1), m = w(m)(d)) : m = a, b[x] = m
                    }), b
                }

                function e(a) {
                    t(a || {}, this)
                }
                var y = new l(b),
                    a = r({}, z, a);
                return j(a, function(d, g) {
                    var l = "POST" == d.method || "PUT" == d.method || "PATCH" == d.method;
                    e[g] = function(a, b, c, g) {
                        var h, i = {},
                            k = o,
                            p = null;
                        switch (arguments.length) {
                            case 4:
                                p = g, k = c;
                            case 3:
                            case 2:
                                if (!q(b)) {
                                    i = a, h = b, k = c;
                                    break
                                }
                                if (q(a)) {
                                    k = a, p = b;
                                    break
                                }
                                k = b, p = c;
                            case 1:
                                q(a) ? k = a : l ? h = a : i = a;
                                break;
                            case 0:
                                break;
                            default:
                                throw "Expected between 0-4 arguments [params, data, success, error], got " + arguments.length + " arguments."
                        }
                        var n = this instanceof e ? this : d.isArray ? [] : new e(h);
                        return v({
                            method: d.method,
                            url: y.url(r({}, f(h), d.params || {}, i)),
                            data: h
                        }).then(function(a) {
                            var b = a.data;
                            b && (d.isArray ? (n.length = 0, j(b, function(a) {
                                n.push(new e(a))
                            })) : t(b, n)), (k || o)(n, a.headers)
                        }, p), n
                    }, e.bind = function(d) {
                        return s(b, r({}, c, d), a)
                    }, e.prototype["$" + g] = function(a, b, d) {
                        var h, c = f(this),
                            i = o;
                        switch (arguments.length) {
                            case 3:
                                c = a, i = b, h = d;
                                break;
                            case 2:
                            case 1:
                                q(a) ? (i = a, h = b) : (c = a, i = b || o);
                            case 0:
                                break;
                            default:
                                throw "Expected between 1-3 arguments [params, success, error], got " + arguments.length + " arguments."
                        }
                        e[g].call(this, c, l ? this : u, i, h)
                    }
                }), e
            }
            var z = {
                    get: {
                        method: "GET"
                    },
                    save: {
                        method: "POST"
                    },
                    query: {
                        method: "GET",
                        isArray: !0
                    },
                    remove: {
                        method: "DELETE"
                    },
                    "delete": {
                        method: "DELETE"
                    }
                },
                o = f.noop,
                j = f.forEach,
                r = f.extend,
                t = f.copy,
                q = f.isFunction;
            return l.prototype = {
                url: function(b) {
                    var f, c = this,
                        a = this.template,
                        b = b || {};
                    j(this.urlParams, function(e, d) {
                        f = g(b[d] || c.defaults[d] || "", !0).replace(/%26/gi, "&").replace(/%3D/gi, "=").replace(/%2B/gi, "+"), a = a.replace(RegExp(":" + d + "(\\W)"), f + "$1")
                    });
                    var a = a.replace(/\/?#$/, ""),
                        e = [];
                    return j(b, function(a, b) {
                        c.urlParams[b] || e.push(g(b) + "=" + g(a))
                    }), e.sort(), a = a.replace(/\/*$/, ""), a + (e.length ? "?" + e.join("&") : "")
                }
            }, s
        }])
    }(window, window.angular),
    function() {
        var e = this,
            t = e._,
            n = {},
            r = Array.prototype,
            i = Object.prototype,
            s = Function.prototype,
            o = r.push,
            u = r.slice,
            a = r.concat,
            l = (r.unshift, i.toString),
            c = i.hasOwnProperty,
            h = r.forEach,
            p = r.map,
            d = r.reduce,
            v = r.reduceRight,
            m = r.filter,
            g = r.every,
            y = r.some,
            b = r.indexOf,
            w = r.lastIndexOf,
            E = Array.isArray,
            S = Object.keys,
            x = s.bind,
            T = function(e) {
                return e instanceof T ? e : this instanceof T ? void(this._wrapped = e) : new T(e)
            };
        "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = T), exports._ = T) : e._ = T, T.VERSION = "1.4.2";
        var N = T.each = T.forEach = function(e, t, r) {
            if (null != e)
                if (h && e.forEach === h) e.forEach(t, r);
                else if (e.length === +e.length) {
                for (var i = 0, s = e.length; s > i; i++)
                    if (t.call(r, e[i], i, e) === n) return
            } else
                for (var o in e)
                    if (T.has(e, o) && t.call(r, e[o], o, e) === n) return
        };
        T.map = T.collect = function(e, t, n) {
            var r = [];
            return null == e ? r : p && e.map === p ? e.map(t, n) : (N(e, function(e, i, s) {
                r[r.length] = t.call(n, e, i, s)
            }), r)
        }, T.reduce = T.foldl = T.inject = function(e, t, n, r) {
            var i = arguments.length > 2;
            if (null == e && (e = []), d && e.reduce === d) return r && (t = T.bind(t, r)), i ? e.reduce(t, n) : e.reduce(t);
            if (N(e, function(e, s, o) {
                    i ? n = t.call(r, n, e, s, o) : (n = e, i = !0)
                }), !i) throw new TypeError("Reduce of empty array with no initial value");
            return n
        }, T.reduceRight = T.foldr = function(e, t, n, r) {
            var i = arguments.length > 2;
            if (null == e && (e = []), v && e.reduceRight === v) return r && (t = T.bind(t, r)), arguments.length > 2 ? e.reduceRight(t, n) : e.reduceRight(t);
            var s = e.length;
            if (s !== +s) {
                var o = T.keys(e);
                s = o.length
            }
            if (N(e, function(u, a, f) {
                    a = o ? o[--s] : --s, i ? n = t.call(r, n, e[a], a, f) : (n = e[a], i = !0)
                }), !i) throw new TypeError("Reduce of empty array with no initial value");
            return n
        }, T.find = T.detect = function(e, t, n) {
            var r;
            return C(e, function(e, i, s) {
                return t.call(n, e, i, s) ? (r = e, !0) : void 0
            }), r
        }, T.filter = T.select = function(e, t, n) {
            var r = [];
            return null == e ? r : m && e.filter === m ? e.filter(t, n) : (N(e, function(e, i, s) {
                t.call(n, e, i, s) && (r[r.length] = e)
            }), r)
        }, T.reject = function(e, t, n) {
            var r = [];
            return null == e ? r : (N(e, function(e, i, s) {
                t.call(n, e, i, s) || (r[r.length] = e)
            }), r)
        }, T.every = T.all = function(e, t, r) {
            t || (t = T.identity);
            var i = !0;
            return null == e ? i : g && e.every === g ? e.every(t, r) : (N(e, function(e, s, o) {
                return (i = i && t.call(r, e, s, o)) ? void 0 : n
            }), !!i)
        };
        var C = T.some = T.any = function(e, t, r) {
            t || (t = T.identity);
            var i = !1;
            return null == e ? i : y && e.some === y ? e.some(t, r) : (N(e, function(e, s, o) {
                return i || (i = t.call(r, e, s, o)) ? n : void 0
            }), !!i)
        };
        T.contains = T.include = function(e, t) {
            var n = !1;
            return null == e ? n : b && e.indexOf === b ? -1 != e.indexOf(t) : n = C(e, function(e) {
                return e === t
            })
        }, T.invoke = function(e, t) {
            var n = u.call(arguments, 2);
            return T.map(e, function(e) {
                return (T.isFunction(t) ? t : e[t]).apply(e, n)
            })
        }, T.pluck = function(e, t) {
            return T.map(e, function(e) {
                return e[t]
            })
        }, T.where = function(e, t) {
            return T.isEmpty(t) ? [] : T.filter(e, function(e) {
                for (var n in t)
                    if (t[n] !== e[n]) return !1;
                return !0
            })
        }, T.max = function(e, t, n) {
            if (!t && T.isArray(e) && e[0] === +e[0] && e.length < 65535) return Math.max.apply(Math, e);
            if (!t && T.isEmpty(e)) return -1 / 0;
            var r = {
                computed: -1 / 0
            };
            return N(e, function(e, i, s) {
                var o = t ? t.call(n, e, i, s) : e;
                o >= r.computed && (r = {
                    value: e,
                    computed: o
                })
            }), r.value
        }, T.min = function(e, t, n) {
            if (!t && T.isArray(e) && e[0] === +e[0] && e.length < 65535) return Math.min.apply(Math, e);
            if (!t && T.isEmpty(e)) return 1 / 0;
            var r = {
                computed: 1 / 0
            };
            return N(e, function(e, i, s) {
                var o = t ? t.call(n, e, i, s) : e;
                o < r.computed && (r = {
                    value: e,
                    computed: o
                })
            }), r.value
        }, T.shuffle = function(e) {
            var t, n = 0,
                r = [];
            return N(e, function(e) {
                t = T.random(n++), r[n - 1] = r[t], r[t] = e
            }), r
        };
        var k = function(e) {
            return T.isFunction(e) ? e : function(t) {
                return t[e]
            }
        };
        T.sortBy = function(e, t, n) {
            var r = k(t);
            return T.pluck(T.map(e, function(e, t, i) {
                return {
                    value: e,
                    index: t,
                    criteria: r.call(n, e, t, i)
                }
            }).sort(function(e, t) {
                var n = e.criteria,
                    r = t.criteria;
                if (n !== r) {
                    if (n > r || void 0 === n) return 1;
                    if (r > n || void 0 === r) return -1
                }
                return e.index < t.index ? -1 : 1
            }), "value")
        };
        var L = function(e, t, n, r) {
            var i = {},
                s = k(t);
            return N(e, function(t, o) {
                var u = s.call(n, t, o, e);
                r(i, u, t)
            }), i
        };
        T.groupBy = function(e, t, n) {
            return L(e, t, n, function(e, t, n) {
                (T.has(e, t) ? e[t] : e[t] = []).push(n)
            })
        }, T.countBy = function(e, t, n) {
            return L(e, t, n, function(e, t) {
                T.has(e, t) || (e[t] = 0), e[t] ++
            })
        }, T.sortedIndex = function(e, t, n, r) {
            n = null == n ? T.identity : k(n);
            for (var i = n.call(r, t), s = 0, o = e.length; o > s;) {
                var u = s + o >>> 1;
                n.call(r, e[u]) < i ? s = u + 1 : o = u
            }
            return s
        }, T.toArray = function(e) {
            return e ? e.length === +e.length ? u.call(e) : T.values(e) : []
        }, T.size = function(e) {
            return e.length === +e.length ? e.length : T.keys(e).length
        }, T.first = T.head = T.take = function(e, t, n) {
            return null == t || n ? e[0] : u.call(e, 0, t)
        }, T.initial = function(e, t, n) {
            return u.call(e, 0, e.length - (null == t || n ? 1 : t))
        }, T.last = function(e, t, n) {
            return null == t || n ? e[e.length - 1] : u.call(e, Math.max(e.length - t, 0))
        }, T.rest = T.tail = T.drop = function(e, t, n) {
            return u.call(e, null == t || n ? 1 : t)
        }, T.compact = function(e) {
            return T.filter(e, function(e) {
                return !!e
            })
        };
        var A = function(e, t, n) {
            return N(e, function(e) {
                T.isArray(e) ? t ? o.apply(n, e) : A(e, t, n) : n.push(e)
            }), n
        };
        T.flatten = function(e, t) {
            return A(e, t, [])
        }, T.without = function(e) {
            return T.difference(e, u.call(arguments, 1))
        }, T.uniq = T.unique = function(e, t, n, r) {
            var i = n ? T.map(e, n, r) : e,
                s = [],
                o = [];
            return N(i, function(n, r) {
                (t ? r && o[o.length - 1] === n : T.contains(o, n)) || (o.push(n), s.push(e[r]))
            }), s
        }, T.union = function() {
            return T.uniq(a.apply(r, arguments))
        }, T.intersection = function(e) {
            var t = u.call(arguments, 1);
            return T.filter(T.uniq(e), function(e) {
                return T.every(t, function(t) {
                    return T.indexOf(t, e) >= 0
                })
            })
        }, T.difference = function(e) {
            var t = a.apply(r, u.call(arguments, 1));
            return T.filter(e, function(e) {
                return !T.contains(t, e)
            })
        }, T.zip = function() {
            for (var e = u.call(arguments), t = T.max(T.pluck(e, "length")), n = new Array(t), r = 0; t > r; r++) n[r] = T.pluck(e, "" + r);
            return n
        }, T.object = function(e, t) {
            for (var n = {}, r = 0, i = e.length; i > r; r++) t ? n[e[r]] = t[r] : n[e[r][0]] = e[r][1];
            return n
        }, T.indexOf = function(e, t, n) {
            if (null == e) return -1;
            var r = 0,
                i = e.length;
            if (n) {
                if ("number" != typeof n) return r = T.sortedIndex(e, t), e[r] === t ? r : -1;
                r = 0 > n ? Math.max(0, i + n) : n
            }
            if (b && e.indexOf === b) return e.indexOf(t, n);
            for (; i > r; r++)
                if (e[r] === t) return r;
            return -1
        }, T.lastIndexOf = function(e, t, n) {
            if (null == e) return -1;
            var r = null != n;
            if (w && e.lastIndexOf === w) return r ? e.lastIndexOf(t, n) : e.lastIndexOf(t);
            for (var i = r ? n : e.length; i--;)
                if (e[i] === t) return i;
            return -1
        }, T.range = function(e, t, n) {
            arguments.length <= 1 && (t = e || 0, e = 0), n = arguments[2] || 1;
            for (var r = Math.max(Math.ceil((t - e) / n), 0), i = 0, s = new Array(r); r > i;) s[i++] = e, e += n;
            return s
        };
        var O = function() {};
        T.bind = function(t, n) {
            var r, i;
            if (t.bind === x && x) return x.apply(t, u.call(arguments, 1));
            if (!T.isFunction(t)) throw new TypeError;
            return i = u.call(arguments, 2), r = function() {
                if (this instanceof r) {
                    O.prototype = t.prototype;
                    var e = new O,
                        s = t.apply(e, i.concat(u.call(arguments)));
                    return Object(s) === s ? s : e
                }
                return t.apply(n, i.concat(u.call(arguments)))
            }
        }, T.bindAll = function(e) {
            var t = u.call(arguments, 1);
            return 0 == t.length && (t = T.functions(e)), N(t, function(t) {
                e[t] = T.bind(e[t], e)
            }), e
        }, T.memoize = function(e, t) {
            var n = {};
            return t || (t = T.identity),
                function() {
                    var r = t.apply(this, arguments);
                    return T.has(n, r) ? n[r] : n[r] = e.apply(this, arguments)
                }
        }, T.delay = function(e, t) {
            var n = u.call(arguments, 2);
            return setTimeout(function() {
                return e.apply(null, n)
            }, t)
        }, T.defer = function(e) {
            return T.delay.apply(T, [e, 1].concat(u.call(arguments, 1)))
        }, T.throttle = function(e, t) {
            var n, r, i, s, o, u, a = T.debounce(function() {
                o = s = !1
            }, t);
            return function() {
                n = this, r = arguments;
                var f = function() {
                    i = null, o && (u = e.apply(n, r)), a()
                };
                return i || (i = setTimeout(f, t)), s ? o = !0 : (s = !0, u = e.apply(n, r)), a(), u
            }
        }, T.debounce = function(e, t, n) {
            var r, i;
            return function() {
                var s = this,
                    o = arguments,
                    u = function() {
                        r = null, n || (i = e.apply(s, o))
                    },
                    a = n && !r;
                return clearTimeout(r), r = setTimeout(u, t), a && (i = e.apply(s, o)), i
            }
        }, T.once = function(e) {
            var n, t = !1;
            return function() {
                return t ? n : (t = !0, n = e.apply(this, arguments), e = null, n)
            }
        }, T.wrap = function(e, t) {
            return function() {
                var n = [e];
                return o.apply(n, arguments), t.apply(this, n)
            }
        }, T.compose = function() {
            var e = arguments;
            return function() {
                for (var t = arguments, n = e.length - 1; n >= 0; n--) t = [e[n].apply(this, t)];
                return t[0]
            }
        }, T.after = function(e, t) {
            return 0 >= e ? t() : function() {
                return --e < 1 ? t.apply(this, arguments) : void 0
            }
        }, T.keys = S || function(e) {
            if (e !== Object(e)) throw new TypeError("Invalid object");
            var t = [];
            for (var n in e) T.has(e, n) && (t[t.length] = n);
            return t
        }, T.values = function(e) {
            var t = [];
            for (var n in e) T.has(e, n) && t.push(e[n]);
            return t
        }, T.pairs = function(e) {
            var t = [];
            for (var n in e) T.has(e, n) && t.push([n, e[n]]);
            return t
        }, T.invert = function(e) {
            var t = {};
            for (var n in e) T.has(e, n) && (t[e[n]] = n);
            return t
        }, T.functions = T.methods = function(e) {
            var t = [];
            for (var n in e) T.isFunction(e[n]) && t.push(n);
            return t.sort()
        }, T.extend = function(e) {
            return N(u.call(arguments, 1), function(t) {
                for (var n in t) e[n] = t[n]
            }), e
        }, T.pick = function(e) {
            var t = {},
                n = a.apply(r, u.call(arguments, 1));
            return N(n, function(n) {
                n in e && (t[n] = e[n])
            }), t
        }, T.omit = function(e) {
            var t = {},
                n = a.apply(r, u.call(arguments, 1));
            for (var i in e) T.contains(n, i) || (t[i] = e[i]);
            return t
        }, T.defaults = function(e) {
            return N(u.call(arguments, 1), function(t) {
                for (var n in t) null == e[n] && (e[n] = t[n])
            }), e
        }, T.clone = function(e) {
            return T.isObject(e) ? T.isArray(e) ? e.slice() : T.extend({}, e) : e
        }, T.tap = function(e, t) {
            return t(e), e
        };
        var M = function(e, t, n, r) {
            if (e === t) return 0 !== e || 1 / e == 1 / t;
            if (null == e || null == t) return e === t;
            e instanceof T && (e = e._wrapped), t instanceof T && (t = t._wrapped);
            var i = l.call(e);
            if (i != l.call(t)) return !1;
            switch (i) {
                case "[object String]":
                    return e == String(t);
                case "[object Number]":
                    return e != +e ? t != +t : 0 == e ? 1 / e == 1 / t : e == +t;
                case "[object Date]":
                case "[object Boolean]":
                    return +e == +t;
                case "[object RegExp]":
                    return e.source == t.source && e.global == t.global && e.multiline == t.multiline && e.ignoreCase == t.ignoreCase
            }
            if ("object" != typeof e || "object" != typeof t) return !1;
            for (var s = n.length; s--;)
                if (n[s] == e) return r[s] == t;
            n.push(e), r.push(t);
            var o = 0,
                u = !0;
            if ("[object Array]" == i) {
                if (o = e.length, u = o == t.length)
                    for (; o-- && (u = M(e[o], t[o], n, r)););
            } else {
                var a = e.constructor,
                    f = t.constructor;
                if (a !== f && !(T.isFunction(a) && a instanceof a && T.isFunction(f) && f instanceof f)) return !1;
                for (var c in e)
                    if (T.has(e, c) && (o++, !(u = T.has(t, c) && M(e[c], t[c], n, r)))) break;
                if (u) {
                    for (c in t)
                        if (T.has(t, c) && !o--) break;
                    u = !o
                }
            }
            return n.pop(), r.pop(), u
        };
        T.isEqual = function(e, t) {
            return M(e, t, [], [])
        }, T.isEmpty = function(e) {
            if (null == e) return !0;
            if (T.isArray(e) || T.isString(e)) return 0 === e.length;
            for (var t in e)
                if (T.has(e, t)) return !1;
            return !0
        }, T.isElement = function(e) {
            return !!e && 1 === e.nodeType
        }, T.isArray = E || function(e) {
            return "[object Array]" == l.call(e)
        }, T.isObject = function(e) {
            return e === Object(e)
        }, N(["Arguments", "Function", "String", "Number", "Date", "RegExp"], function(e) {
            T["is" + e] = function(t) {
                return l.call(t) == "[object " + e + "]"
            }
        }), T.isArguments(arguments) || (T.isArguments = function(e) {
            return !!e && !!T.has(e, "callee")
        }), "function" != typeof /./ && (T.isFunction = function(e) {
            return "function" == typeof e
        }), T.isFinite = function(e) {
            return T.isNumber(e) && isFinite(e)
        }, T.isNaN = function(e) {
            return T.isNumber(e) && e != +e
        }, T.isBoolean = function(e) {
            return e === !0 || e === !1 || "[object Boolean]" == l.call(e)
        }, T.isNull = function(e) {
            return null === e
        }, T.isUndefined = function(e) {
            return void 0 === e
        }, T.has = function(e, t) {
            return c.call(e, t)
        }, T.noConflict = function() {
            return e._ = t, this
        }, T.identity = function(e) {
            return e
        }, T.times = function(e, t, n) {
            for (var r = 0; e > r; r++) t.call(n, r)
        }, T.random = function(e, t) {
            return null == t && (t = e, e = 0), e + (0 | Math.random() * (t - e + 1))
        };
        var _ = {
            escape: {
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                '"': "&quot;",
                "'": "&#x27;",
                "/": "&#x2F;"
            }
        };
        _.unescape = T.invert(_.escape);
        var D = {
            escape: new RegExp("[" + T.keys(_.escape).join("") + "]", "g"),
            unescape: new RegExp("(" + T.keys(_.unescape).join("|") + ")", "g")
        };
        T.each(["escape", "unescape"], function(e) {
            T[e] = function(t) {
                return null == t ? "" : ("" + t).replace(D[e], function(t) {
                    return _[e][t]
                })
            }
        }), T.result = function(e, t) {
            if (null == e) return null;
            var n = e[t];
            return T.isFunction(n) ? n.call(e) : n
        }, T.mixin = function(e) {
            N(T.functions(e), function(t) {
                var n = T[t] = e[t];
                T.prototype[t] = function() {
                    var e = [this._wrapped];
                    return o.apply(e, arguments), F.call(this, n.apply(T, e))
                }
            })
        };
        var P = 0;
        T.uniqueId = function(e) {
            var t = P++;
            return e ? e + t : t
        }, T.templateSettings = {
            evaluate: /<%([\s\S]+?)%>/g,
            interpolate: /<%=([\s\S]+?)%>/g,
            escape: /<%-([\s\S]+?)%>/g
        };
        var H = /(.)^/,
            B = {
                "'": "'",
                "\\": "\\",
                "\r": "r",
                "\n": "n",
                "   ": "t",
                "\u2028": "u2028",
                "\u2029": "u2029"
            },
            j = /\\|'|\r|\n|\t|\u2028|\u2029/g;
        T.template = function(e, t, n) {
            n = T.defaults({}, n, T.templateSettings);
            var r = new RegExp([(n.escape || H).source, (n.interpolate || H).source, (n.evaluate || H).source].join("|") + "|$", "g"),
                i = 0,
                s = "__p+='";
            e.replace(r, function(t, n, r, o, u) {
                s += e.slice(i, u).replace(j, function(e) {
                    return "\\" + B[e]
                }), s += n ? "'+\n((__t=(" + n + "))==null?'':_.escape(__t))+\n'" : r ? "'+\n((__t=(" + r + "))==null?'':__t)+\n'" : o ? "';\n" + o + "\n__p+='" : "", i = u + t.length
            }), s += "';\n", n.variable || (s = "with(obj||{}){\n" + s + "}\n"), s = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + s + "return __p;\n";
            try {
                var o = new Function(n.variable || "obj", "_", s)
            } catch (u) {
                throw u.source = s, u
            }
            if (t) return o(t, T);
            var a = function(e) {
                return o.call(this, e, T)
            };
            return a.source = "function(" + (n.variable || "obj") + "){\n" + s + "}", a
        }, T.chain = function(e) {
            return T(e).chain()
        };
        var F = function(e) {
            return this._chain ? T(e).chain() : e
        };
        T.mixin(T), N(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function(e) {
            var t = r[e];
            T.prototype[e] = function() {
                var n = this._wrapped;
                return t.apply(n, arguments), ("shift" == e || "splice" == e) && 0 === n.length && delete n[0], F.call(this, n)
            }
        }), N(["concat", "join", "slice"], function(e) {
            var t = r[e];
            T.prototype[e] = function() {
                return F.call(this, t.apply(this._wrapped, arguments))
            }
        }), T.extend(T.prototype, {
            chain: function() {
                return this._chain = !0, this
            },
            value: function() {
                return this._wrapped
            }
        })
    }.call(this),
    function($) {
        $.fn.tile = function(columns) {
            var tiles, max, c, h, s, last = this.length - 1;
            return columns || (columns = this.length), this.each(function() {
                s = this.style, s.removeProperty && s.removeProperty("height"), s.removeAttribute && s.removeAttribute("height")
            }), this.each(function(i) {
                c = i % columns, 0 == c && (tiles = []), tiles[c] = $(this), h = tiles[c].height(), (0 == c || h > max) && (max = h), (i == last || c == columns - 1) && $.each(tiles, function() {
                    this.height(max)
                })
            })
        }
    }(jQuery),
    function($) {
        function maybeCall(thing, ctx) {
            return "function" == typeof thing ? thing.call(ctx) : thing
        }

        function Tipsy(element, options) {
            this.$element = $(element), this.options = options, this.enabled = !0, this.fixTitle()
        }
        Tipsy.prototype = {
            show: function() {
                var title = this.getTitle();
                if (title && this.enabled) {
                    var $tip = this.tip();
                    $tip.find(".tipsy-inner")[this.options.html ? "html" : "text"](title), $tip[0].className = "tipsy", $tip.remove().css({
                        top: 0,
                        left: 0,
                        visibility: "hidden",
                        display: "block"
                    }).prependTo(document.body);
                    var tp, pos = $.extend({}, this.$element.offset(), {
                            width: this.$element[0].offsetWidth,
                            height: this.$element[0].offsetHeight
                        }),
                        actualWidth = $tip[0].offsetWidth,
                        actualHeight = $tip[0].offsetHeight,
                        gravity = maybeCall(this.options.gravity, this.$element[0]);
                    switch (gravity.charAt(0)) {
                        case "n":
                            tp = {
                                top: pos.top + pos.height + this.options.offset,
                                left: pos.left + pos.width / 2 - actualWidth / 2
                            };
                            break;
                        case "s":
                            tp = {
                                top: pos.top - actualHeight - this.options.offset,
                                left: pos.left + pos.width / 2 - actualWidth / 2
                            };
                            break;
                        case "e":
                            tp = {
                                top: pos.top + pos.height / 2 - actualHeight / 2,
                                left: pos.left - actualWidth - this.options.offset
                            };
                            break;
                        case "w":
                            tp = {
                                top: pos.top + pos.height / 2 - actualHeight / 2,
                                left: pos.left + pos.width + this.options.offset
                            }
                    }
                    2 == gravity.length && (tp.left = "w" == gravity.charAt(1) ? pos.left + pos.width / 2 - 15 : pos.left + pos.width / 2 - actualWidth + 15), $tip.css(tp).addClass("tipsy-" + gravity), $tip.find(".tipsy-arrow")[0].className = "tipsy-arrow tipsy-arrow-" + gravity.charAt(0), this.options.className && $tip.addClass(maybeCall(this.options.className, this.$element[0])), this.options.fade ? $tip.stop().css({
                        opacity: 0,
                        display: "block",
                        visibility: "visible"
                    }).animate({
                        opacity: this.options.opacity
                    }) : $tip.css({
                        visibility: "visible",
                        opacity: this.options.opacity
                    })
                }
            },
            hide: function() {
                this.options.fade ? this.tip().stop().fadeOut(function() {
                    $(this).remove()
                }) : this.tip().remove()
            },
            fixTitle: function() {
                var $e = this.$element;
                ($e.attr("title") || "string" != typeof $e.attr("original-title")) && $e.attr("original-title", $e.attr("title") || "").removeAttr("title")
            },
            getTitle: function() {
                var title, $e = this.$element,
                    o = this.options;
                this.fixTitle();
                var title, o = this.options;
                return "string" == typeof o.title ? title = $e.attr("title" == o.title ? "original-title" : o.title) : "function" == typeof o.title && (title = o.title.call($e[0])), title = ("" + title).replace(/(^\s*|\s*$)/, ""), title || o.fallback
            },
            tip: function() {
                return this.$tip || (this.$tip = $('<div class="tipsy"></div>').html('<div class="tipsy-arrow"></div><div class="tipsy-inner"></div>')), this.$tip
            },
            validate: function() {
                this.$element[0].parentNode || (this.hide(), this.$element = null, this.options = null)
            },
            enable: function() {
                this.enabled = !0
            },
            disable: function() {
                this.enabled = !1
            },
            toggleEnabled: function() {
                this.enabled = !this.enabled
            }
        }, $.fn.tipsy = function(options) {
            function get(ele) {
                var tipsy = $.data(ele, "tipsy");
                return tipsy || (tipsy = new Tipsy(ele, $.fn.tipsy.elementOptions(ele, options)), $.data(ele, "tipsy", tipsy)), tipsy
            }

            function enter() {
                var tipsy = get(this);
                tipsy.hoverState = "in", 0 == options.delayIn ? tipsy.show() : (tipsy.fixTitle(), setTimeout(function() {
                    "in" == tipsy.hoverState && tipsy.show()
                }, options.delayIn))
            }

            function leave() {
                var tipsy = get(this);
                tipsy.hoverState = "out", 0 == options.delayOut ? tipsy.hide() : setTimeout(function() {
                    "out" == tipsy.hoverState && tipsy.hide()
                }, options.delayOut)
            }
            if (options === !0) return this.data("tipsy");
            if ("string" == typeof options) {
                var tipsy = this.data("tipsy");
                return tipsy && tipsy[options](), this
            }
            if (options = $.extend({}, $.fn.tipsy.defaults, options), options.live || this.each(function() {
                    get(this)
                }), "manual" != options.trigger) {
                var binder = options.live ? "live" : "bind",
                    eventIn = "hover" == options.trigger ? "mouseenter" : "focus",
                    eventOut = "hover" == options.trigger ? "mouseleave" : "blur";
                this[binder](eventIn, enter)[binder](eventOut, leave)
            }
            return this
        }, $.fn.tipsy.defaults = {
            className: null,
            delayIn: 0,
            delayOut: 0,
            fade: !1,
            fallback: "",
            gravity: "n",
            html: !1,
            live: !1,
            offset: 0,
            opacity: .8,
            title: "title",
            trigger: "hover"
        }, $.fn.tipsy.elementOptions = function(ele, options) {
            return $.metadata ? $.extend({}, options, $(ele).metadata()) : options
        }, $.fn.tipsy.autoNS = function() {
            return $(this).offset().top > $(document).scrollTop() + $(window).height() / 2 ? "s" : "n"
        }, $.fn.tipsy.autoWE = function() {
            return $(this).offset().left > $(document).scrollLeft() + $(window).width() / 2 ? "e" : "w"
        }, $.fn.tipsy.autoBounds = function(margin, prefer) {
            return function() {
                var dir = {
                        ns: prefer[0],
                        ew: prefer.length > 1 ? prefer[1] : !1
                    },
                    boundTop = $(document).scrollTop() + margin,
                    boundLeft = $(document).scrollLeft() + margin,
                    $this = $(this);
                return $this.offset().top < boundTop && (dir.ns = "n"), $this.offset().left < boundLeft && (dir.ew = "w"), $(window).width() + $(document).scrollLeft() - $this.offset().left < margin && (dir.ew = "e"), $(window).height() + $(document).scrollTop() - $this.offset().top < margin && (dir.ns = "s"), dir.ns + (dir.ew ? dir.ew : "")
            }
        }
    }(jQuery),
    /*!
     * jQuery Cookie Plugin v1.3.1
     * https://github.com/carhartl/jquery-cookie
     *
     * Copyright 2013 Klaus Hartl
     * Released under the MIT license
     */
    function($, document, undefined) {
        function raw(s) {
            return s
        }

        function decoded(s) {
            return unRfc2068(decodeURIComponent(s.replace(pluses, " ")))
        }

        function unRfc2068(value) {
            return 0 === value.indexOf('"') && (value = value.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\")), value
        }

        function fromJSON(value) {
            return config.json ? JSON.parse(value) : value
        }
        var pluses = /\+/g,
            config = $.cookie = function(key, value, options) {
                if (value !== undefined) {
                    if (options = $.extend({}, config.defaults, options), null === value && (options.expires = -1), "number" == typeof options.expires) {
                        var days = options.expires,
                            t = options.expires = new Date;
                        t.setDate(t.getDate() + days)
                    }
                    return value = config.json ? JSON.stringify(value) : String(value), document.cookie = [encodeURIComponent(key), "=", config.raw ? value : encodeURIComponent(value), options.expires ? "; expires=" + options.expires.toUTCString() : "", options.path ? "; path=" + options.path : "", options.domain ? "; domain=" + options.domain : "", options.secure ? "; secure" : ""].join("")
                }
                for (var decode = config.raw ? raw : decoded, cookies = document.cookie.split("; "), result = key ? null : {}, i = 0, l = cookies.length; l > i; i++) {
                    var parts = cookies[i].split("="),
                        name = decode(parts.shift()),
                        cookie = decode(parts.join("="));
                    if (key && key === name) {
                        result = fromJSON(cookie);
                        break
                    }
                    key || (result[name] = fromJSON(cookie))
                }
                return result
            };
        config.defaults = {}, $.removeCookie = function(key, options) {
            return null !== $.cookie(key) ? ($.cookie(key, null, options), !0) : !1
        }
    }(jQuery, document),
    /*
     *  Sugar Library v1.3
     *
     *  Freely distributable and licensed under the MIT-style license.
     *  Copyright (c) 2012 Andrew Plummer
     *  http://sugarjs.com/
     *
     * ---------------------------- */
    function() {
        function y(a) {
            return function(b) {
                return ga(b, a)
            }
        }

        function ga(a, b) {
            return p.prototype.toString.call(a) === "[object " + b + "]"
        }

        function ha(a) {
            a.SugarMethods || (ia(a, "SugarMethods", {}), G(a, m, m, {
                restore: function() {
                    var b = 0 === arguments.length,
                        c = H(arguments);
                    I(a.SugarMethods, function(d, e) {
                        (b || c.indexOf(d) > -1) && ia(e.za ? a.prototype : a, d, e.method)
                    })
                },
                extend: function(b, c, d) {
                    G(a, d !== m, c, b)
                }
            }))
        }

        function G(a, b, c, d) {
            var g, e = b ? a.prototype : a;
            ha(a), I(d, function(f, i) {
                g = e[f], "function" == typeof c && (i = ja(e[f], i, c)), c === m && e[f] || ia(e, f, i), a.SugarMethods[f] = {
                    za: b,
                    method: i,
                    Ga: g
                }
            })
        }

        function J(a, b, c, d, e) {
            var g = {};
            d = E(d) ? d.split(",") : d, d.forEach(function(f, i) {
                e(g, f, i)
            }), G(a, b, c, g)
        }

        function ja(a, b, c) {
            return function() {
                return !a || c !== j && c.apply(this, arguments) ? b.apply(this, arguments) : a.apply(this, arguments)
            }
        }

        function ia(a, b, c) {
            ca ? p.defineProperty(a, b, {
                value: c,
                configurable: j,
                enumerable: m,
                writable: j
            }) : a[b] = c
        }

        function H(a, b) {
            var c = [],
                d = 0;
            for (d = 0; d < a.length; d++) c.push(a[d]), b && b.call(a, a[d], d);
            return c
        }

        function K(a) {
            return void 0 !== a
        }

        function L(a) {
            return void 0 === a
        }

        function ka(a) {
            return a && "object" == typeof a
        }

        function la(a) {
            return !!a && ga(a, "Object") && u(a.constructor) === u(p)
        }

        function ma(a, b) {
            return p.hasOwnProperty.call(a, b)
        }

        function I(a, b) {
            for (var c in a)
                if (ma(a, c) && b.call(a, c, a[c]) === m) break
        }

        function na(a, b) {
            return I(b, function(c) {
                a[c] = b[c]
            }), a
        }

        function M(a) {
            na(this, a)
        }

        function N(a, b, c, d) {
            var e = [];
            a = parseInt(a);
            for (var g = 0 > d; !g && b >= a || g && a >= b;) e.push(a), c && c.call(this, a), a += d || 1;
            return e
        }

        function O(a, b, c) {
            c = w[c || "round"];
            var d = w.pow(10, w.abs(b || 0));
            return 0 > b && (d = 1 / d), c(a * d) / d
        }

        function P(a, b) {
            return O(a, b, "floor")
        }

        function Q(a, b, c, d) {
            return d = w.abs(a).toString(d || 10), d = oa(b - d.replace(/\.\d+/, "").length, "0") + d, (c || 0 > a) && (d = (0 > a ? "-" : "+") + d), d
        }

        function ra() {
            return "    \n\f\r \xa0\u1680\u180e\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u202f\u205f\u2028\u2029\u3000\ufeff"
        }

        function oa(a, b) {
            return r(w.max(0, K(a) ? a : 1) + 1).join(b || "")
        }

        function sa(a, b) {
            var c = a.toString().match(/[^/]*$/)[0];
            return b && (c = (c + b).split("").sort().join("").replace(/([gimy])\1+/g, "$1")), c
        }

        function R(a) {
            return E(a) || (a = u(a)), a.replace(/([\\/'*+?|()\[\]{}.^$])/g, "\\$1")
        }

        function ta(a, b, c) {
            var f, d = [],
                e = a.length,
                g = b[b.length - 1] !== m;
            return H(b, function(i) {
                return ea(i) ? m : (g && (i %= e, 0 > i && (i = e + i)), f = c ? a.charAt(i) || "" : a[i], void d.push(f))
            }), d.length < 2 ? d[0] : d
        }

        function va(a, b, c, d) {
            var e = a.length,
                g = -1 == d,
                f = g ? e - 1 : 0;
            for (c = isNaN(c) ? f : parseInt(c >> 0), 0 > c && (c = e + c), (!g && 0 > c || g && c >= e) && (c = f); g && c >= 0 || !g && e > c;) {
                if (a[c] === b) return c;
                c += d
            }
            return -1
        }

        function wa(a, b, c, d) {
            var e = a.length,
                g = 0,
                f = K(c);
            if (xa(b), 0 == e && !f) throw new TypeError("Reduce called on empty array with no initial value");
            for (f ? c = c : (c = a[d ? e - 1 : g], g++); e > g;) f = d ? e - g - 1 : g, f in a && (c = b(c, a[f], f, a)), g++;
            return c
        }

        function xa(a) {
            if (!a || !a.call) throw new TypeError("Callback is not callable")
        }

        function ya(a) {
            if (0 === a.length) throw new TypeError("First argument must be defined")
        }

        function dc(a, b, c, d) {
            Vb || ec();
            var e = H(b).join(""),
                g = Vb[d];
            return e = e.replace(/all/, "").replace(/(\w)lphabet|umbers?|atakana|paces?|unctuation/g, "$1"), a.replace(c, function(f) {
                return !g[f] || e && !e.has(g[f].type) ? f : g[f].to
            })
        }

        function ec() {
            var a;
            Vb = {
                zenkaku: {},
                hankaku: {}
            }, Ub.forEach(function(b) {
                N(b.start, b.end, function(c) {
                    $(b.type, u.fromCharCode(c), u.fromCharCode(c + b.shift))
                })
            }), cc.each(function(b, c) {
                a = bc.charAt(c), $("k", a, b), b.match($b) && $("k", a + "\uff9e", b.shift(1)), b.match(ac) && $("k", a + "\uff9f", b.shift(2))
            }), Zb.each(function(b, c) {
                $("p", Yb.charAt(c), b)
            }), $("k", "\uff73\uff9e", "\u30f4"), $("k", "\uff66\uff9e", "\u30fa"), $("s", " ", "\u3000")
        }

        function $(a, b, c) {
            Vb.zenkaku[b] = {
                type: a,
                to: c
            }, Vb.hankaku[c] = {
                type: a,
                to: b
            }
        }

        function fc() {
            Rb = {}, I(Tb, function(a, b) {
                b.split("").forEach(function(c) {
                    Rb[c] = a
                }), Sb += b
            }), Sb = s("[" + Sb + "]", "g")
        }
        var j = !0,
            m = !1,
            p = Object,
            r = Array,
            s = RegExp,
            t = Date,
            u = String,
            w = Math,
            ba = "undefined" != typeof global ? global : this,
            ca = p.defineProperty && p.defineProperties,
            x = "Array,Boolean,Date,Function,Number,String,RegExp".split(","),
            ea = (y(x[0]), y(x[1])),
            z = (y(x[2]), y(x[3])),
            D = y(x[4]),
            E = y(x[5]),
            F = y(x[6]);
        M.prototype.constructor = p, ha(p), I(x, function(a, b) {
                ha(ba[b])
            }), G(p, m, m, {
                keys: function(a) {
                    var b = [];
                    if (!ka(a) && !F(a) && !z(a)) throw new TypeError("Object required");
                    return I(a, function(c) {
                        b.push(c)
                    }), b
                }
            }), G(r, m, m, {
                isArray: function(a) {
                    return ga(a, "Array")
                }
            }), G(r, j, m, {
                every: function(a, b) {
                    var c = this.length,
                        d = 0;
                    for (ya(arguments); c > d;) {
                        if (d in this && !a.call(b, this[d], d, this)) return m;
                        d++
                    }
                    return j
                },
                some: function(a, b) {
                    var c = this.length,
                        d = 0;
                    for (ya(arguments); c > d;) {
                        if (d in this && a.call(b, this[d], d, this)) return j;
                        d++
                    }
                    return m
                },
                map: function(a, b) {
                    var c = this.length,
                        d = 0,
                        e = Array(c);
                    for (ya(arguments); c > d;) d in this && (e[d] = a.call(b, this[d], d, this)), d++;
                    return e
                },
                filter: function(a, b) {
                    var c = this.length,
                        d = 0,
                        e = [];
                    for (ya(arguments); c > d;) d in this && a.call(b, this[d], d, this) && e.push(this[d]), d++;
                    return e
                },
                indexOf: function(a, b) {
                    return E(this) ? this.indexOf(a, b) : va(this, a, b, 1)
                },
                lastIndexOf: function(a, b) {
                    return E(this) ? this.lastIndexOf(a, b) : va(this, a, b, -1)
                },
                forEach: function(a, b) {
                    var c = this.length,
                        d = 0;
                    for (xa(a); c > d;) d in this && a.call(b, this[d], d, this), d++
                },
                reduce: function(a, b) {
                    return wa(this, a, b)
                },
                reduceRight: function(a, b) {
                    return wa(this, a, b, j)
                }
            }), G(t, m, m, {
                now: function() {
                    return (new t).getTime()
                }
            }),
            function() {
                var a = ra().match(/^\s+$/);
                try {
                    u.prototype.trim.call([1])
                } catch (b) {
                    a = m
                }
                G(u, j, !a, {
                    trim: function() {
                        return this.toString().trimLeft().trimRight()
                    },
                    trimLeft: function() {
                        return this.replace(s("^[" + ra() + "]+"), "")
                    },
                    trimRight: function() {
                        return this.replace(s("[" + ra() + "]+$"), "")
                    }
                })
            }(),
            function() {
                var a = m;
                if (Function.prototype.ta) {
                    a = function() {};
                    var b = a.ta();
                    a = new b instanceof b && !(new a instanceof b)
                }
                G(Function, j, !a, {
                    bind: function(c) {
                        var g, f, d = this,
                            e = H(arguments).slice(1);
                        if (!z(this)) throw new TypeError("Function.prototype.bind called on a non-function");
                        return f = function() {
                            return d.apply(d.prototype && this instanceof d ? this : c, e.concat(H(arguments)))
                        }, g = function() {}, g.prototype = this.prototype, f.prototype = new g, f
                    }
                })
            }(),
            function() {
                var a = new t(t.UTC(1999, 11, 31));
                a = a.toISOString && "1999-12-31T00:00:00.000Z" === a.toISOString(), J(t, j, !a, "toISOString,toJSON", function(b, c) {
                    b[c] = function() {
                        return Q(this.getUTCFullYear(), 4) + "-" + Q(this.getUTCMonth() + 1, 2) + "-" + Q(this.getUTCDate(), 2) + "T" + Q(this.getUTCHours(), 2) + ":" + Q(this.getUTCMinutes(), 2) + ":" + Q(this.getUTCSeconds(), 2) + "." + Q(this.getUTCMilliseconds(), 3) + "Z"
                    }
                })
            }();
        var Db, Eb;
        G(u, j, m, {
                escapeRegExp: function() {
                    return R(this)
                },
                escapeURL: function(a) {
                    return a ? encodeURIComponent(this) : encodeURI(this)
                },
                unescapeURL: function(a) {
                    return a ? decodeURI(this) : decodeURIComponent(this)
                },
                escapeHTML: function() {
                    return this.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
                },
                unescapeHTML: function() {
                    return this.replace(/&lt;/g, "<").replace(/&gt;/g, ">").replace(/&amp;/g, "&")
                },
                encodeBase64: function() {
                    return Db(this)
                },
                decodeBase64: function() {
                    return Eb(this)
                },
                each: function(a, b) {
                    var c, d;
                    if (z(a) ? (b = a, a = /[\s\S]/g) : a ? E(a) ? a = s(R(a), "gi") : F(a) && (a = s(a.source, sa(a, "g"))) : a = /[\s\S]/g, c = this.match(a) || [], b)
                        for (d = 0; d < c.length; d++) c[d] = b.call(this, c[d], d, c) || c[d];
                    return c
                },
                shift: function(a) {
                    var b = "";
                    return a = a || 0, this.codes(function(c) {
                        b += u.fromCharCode(c + a)
                    }), b
                },
                codes: function(a) {
                    for (var b = [], c = 0; c < this.length; c++) {
                        var d = this.charCodeAt(c);
                        b.push(d), a && a.call(this, d, c)
                    }
                    return b
                },
                chars: function(a) {
                    return this.each(a)
                },
                words: function(a) {
                    return this.trim().each(/\S+/g, a)
                },
                lines: function(a) {
                    return this.trim().each(/^.*$/gm, a)
                },
                paragraphs: function(a) {
                    var b = this.trim().split(/[\r\n]{2,}/);
                    return b = b.map(function(c) {
                        if (a) var d = a.call(c);
                        return d ? d : c
                    })
                },
                startsWith: function(a, b) {
                    L(b) && (b = j);
                    var c = F(a) ? a.source.replace("^", "") : R(a);
                    return s("^" + c, b ? "" : "i").test(this)
                },
                endsWith: function(a, b) {
                    L(b) && (b = j);
                    var c = F(a) ? a.source.replace("$", "") : R(a);
                    return s(c + "$", b ? "" : "i").test(this)
                },
                isBlank: function() {
                    return 0 === this.trim().length
                },
                has: function(a) {
                    return -1 !== this.search(F(a) ? a : R(a))
                },
                add: function(a, b) {
                    return b = L(b) ? this.length : b, this.slice(0, b) + a + this.slice(b)
                },
                remove: function(a) {
                    return this.replace(a, "")
                },
                reverse: function() {
                    return this.split("").reverse().join("")
                },
                compact: function() {
                    return this.trim().replace(/([\r\n\s\u3000])+/g, function(a, b) {
                        return "\u3000" === b ? b : " "
                    })
                },
                at: function() {
                    return ta(this, arguments, j)
                },
                from: function(a) {
                    return this.slice(a)
                },
                to: function(a) {
                    return L(a) && (a = this.length), this.slice(0, a)
                },
                dasherize: function() {
                    return this.underscore().replace(/_/g, "-")
                },
                underscore: function() {
                    return this.replace(/[-\s]+/g, "_").replace(u.Inflector && u.Inflector.acronymRegExp, function(a, b) {
                        return (b > 0 ? "_" : "") + a.toLowerCase()
                    }).replace(/([A-Z\d]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").toLowerCase()
                },
                camelize: function(a) {
                    return this.underscore().replace(/(^|_)([^_]+)/g, function(b, c, d, e) {
                        return b = d, b = (c = u.Inflector) && c.acronyms[b], b = E(b) ? b : void 0, e = a !== m || e > 0, b ? e ? b : b.toLowerCase() : e ? d.capitalize() : d
                    })
                },
                spacify: function() {
                    return this.underscore().replace(/_/g, " ")
                },
                stripTags: function() {
                    var a = this;
                    return H(arguments.length > 0 ? arguments : [""], function(b) {
                        a = a.replace(s("</?" + R(b) + "[^<>]*>", "gi"), "")
                    }), a
                },
                removeTags: function() {
                    var a = this;
                    return H(arguments.length > 0 ? arguments : ["\\S+"], function(b) {
                        b = s("<(" + b + ")[^<>]*(?:\\/>|>.*?<\\/\\1>)", "gi"), a = a.replace(b, "")
                    }), a
                },
                truncate: function(a, b, c, d) {
                    var e = "",
                        g = "",
                        f = this.toString(),
                        i = "[" + ra() + "]+",
                        h = "[^" + ra() + "]*",
                        l = s(i + h + "$");
                    if (d = L(d) ? "..." : u(d), f.length <= a) return f;
                    switch (c) {
                        case "left":
                            a = f.length - a, e = d, f = f.slice(a), l = s("^" + h + i);
                            break;
                        case "middle":
                            a = P(a / 2), g = d + f.slice(f.length - a).trimLeft(), f = f.slice(0, a);
                            break;
                        default:
                            a = a, g = d, f = f.slice(0, a)
                    }
                    return b === m && this.slice(a, a + 1).match(/\S/) && (f = f.remove(l)), e + f + g
                },
                pad: function(a, b) {
                    return oa(b, a) + this + oa(b, a)
                },
                padLeft: function(a, b) {
                    return oa(b, a) + this
                },
                padRight: function(a, b) {
                    return this + oa(b, a)
                },
                first: function(a) {
                    return L(a) && (a = 1), this.substr(0, a)
                },
                last: function(a) {
                    return L(a) && (a = 1), this.substr(this.length - a < 0 ? 0 : this.length - a)
                },
                repeat: function(a) {
                    var b = "",
                        c = 0;
                    if (D(a) && a > 0)
                        for (; a > c;) b += this, c++;
                    return b
                },
                toNumber: function(a) {
                    var b = this.replace(/,/g, "");
                    return b.match(/\./) ? parseFloat(b) : parseInt(b, a || 10)
                },
                capitalize: function(a) {
                    var b;
                    return this.toLowerCase().replace(a ? /[\s\S]/g : /^\S/, function(c) {
                        var e, d = c.toUpperCase();
                        return e = b ? c : d, b = d !== c, e
                    })
                },
                assign: function() {
                    var a = {};
                    return H(arguments, function(b, c) {
                        la(b) ? na(a, b) : a[c + 1] = b
                    }), this.replace(/\{([^{]+?)\}/g, function(b, c) {
                        return ma(a, c) ? a[c] : b
                    })
                },
                namespace: function(a) {
                    return a = a || ba, I(this.split("."), function(b, c) {
                        return !!(a = a[c])
                    }), a
                }
            }), G(u, j, m, {
                insert: u.prototype.add
            }),
            function(a) {
                if (this.btoa) Db = this.btoa, Eb = this.atob;
                else {
                    var b = /[^A-Za-z0-9\+\/\=]/g;
                    Db = function(c) {
                        var e, g, f, i, h, l, d = "",
                            n = 0;
                        do e = c.charCodeAt(n++), g = c.charCodeAt(n++), f = c.charCodeAt(n++), i = e >> 2, e = (3 & e) << 4 | g >> 4, h = (15 & g) << 2 | f >> 6, l = 63 & f, isNaN(g) ? h = l = 64 : isNaN(f) && (l = 64), d = d + a.charAt(i) + a.charAt(e) + a.charAt(h) + a.charAt(l); while (n < c.length);
                        return d
                    }, Eb = function(c) {
                        var e, g, f, i, h, d = "",
                            l = 0;
                        if (c.match(b)) throw Error("String contains invalid base64 characters");
                        c = c.replace(/[^A-Za-z0-9\+\/\=]/g, "");
                        do e = a.indexOf(c.charAt(l++)), g = a.indexOf(c.charAt(l++)), i = a.indexOf(c.charAt(l++)), h = a.indexOf(c.charAt(l++)), e = e << 2 | g >> 4, g = (15 & g) << 4 | i >> 2, f = (3 & i) << 6 | h, d += u.fromCharCode(e), 64 != i && (d += u.fromCharCode(g)), 64 != h && (d += u.fromCharCode(f)); while (l < c.length);
                        return d
                    }
                }
            }("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=");
        var Rb, Tb, Vb, Sb = "",
            Ub = [{
                type: "a",
                shift: 65248,
                start: 65,
                end: 90
            }, {
                type: "a",
                shift: 65248,
                start: 97,
                end: 122
            }, {
                type: "n",
                shift: 65248,
                start: 48,
                end: 57
            }, {
                type: "p",
                shift: 65248,
                start: 33,
                end: 47
            }, {
                type: "p",
                shift: 65248,
                start: 58,
                end: 64
            }, {
                type: "p",
                shift: 65248,
                start: 91,
                end: 96
            }, {
                type: "p",
                shift: 65248,
                start: 123,
                end: 126
            }],
            Wb = /[\u0020-\u00A5]|[\uFF61-\uFF9F][\uff9e\uff9f]?/g,
            Xb = /[\u3000-\u301C]|[\u301A-\u30FC]|[\uFF01-\uFF60]|[\uFFE0-\uFFE6]/g,
            Yb = "\uff61\uff64\uff62\uff63\xa5\xa2\xa3",
            Zb = "\u3002\u3001\u300c\u300d\uffe5\uffe0\uffe1",
            $b = /[\u30ab\u30ad\u30af\u30b1\u30b3\u30b5\u30b7\u30b9\u30bb\u30bd\u30bf\u30c1\u30c4\u30c6\u30c8\u30cf\u30d2\u30d5\u30d8\u30db]/,
            ac = /[\u30cf\u30d2\u30d5\u30d8\u30db\u30f2]/,
            bc = "\uff71\uff72\uff73\uff74\uff75\uff67\uff68\uff69\uff6a\uff6b\uff76\uff77\uff78\uff79\uff7a\uff7b\uff7c\uff7d\uff7e\uff7f\uff80\uff81\uff82\uff6f\uff83\uff84\uff85\uff86\uff87\uff88\uff89\uff8a\uff8b\uff8c\uff8d\uff8e\uff8f\uff90\uff91\uff92\uff93\uff94\uff6c\uff95\uff6d\uff96\uff6e\uff97\uff98\uff99\uff9a\uff9b\uff9c\uff66\uff9d\uff70\uff65",
            cc = "\u30a2\u30a4\u30a6\u30a8\u30aa\u30a1\u30a3\u30a5\u30a7\u30a9\u30ab\u30ad\u30af\u30b1\u30b3\u30b5\u30b7\u30b9\u30bb\u30bd\u30bf\u30c1\u30c4\u30c3\u30c6\u30c8\u30ca\u30cb\u30cc\u30cd\u30ce\u30cf\u30d2\u30d5\u30d8\u30db\u30de\u30df\u30e0\u30e1\u30e2\u30e4\u30e3\u30e6\u30e5\u30e8\u30e7\u30e9\u30ea\u30eb\u30ec\u30ed\u30ef\u30f2\u30f3\u30fc\u30fb";
        Tb = {
            A: "A\u24b6\uff21\xc0\xc1\xc2\u1ea6\u1ea4\u1eaa\u1ea8\xc3\u0100\u0102\u1eb0\u1eae\u1eb4\u1eb2\u0226\u01e0\xc4\u01de\u1ea2\xc5\u01fa\u01cd\u0200\u0202\u1ea0\u1eac\u1eb6\u1e00\u0104\u023a\u2c6f",
            B: "B\u24b7\uff22\u1e02\u1e04\u1e06\u0243\u0182\u0181",
            C: "C\u24b8\uff23\u0106\u0108\u010a\u010c\xc7\u1e08\u0187\u023b\ua73e",
            D: "D\u24b9\uff24\u1e0a\u010e\u1e0c\u1e10\u1e12\u1e0e\u0110\u018b\u018a\u0189\ua779",
            E: "E\u24ba\uff25\xc8\xc9\xca\u1ec0\u1ebe\u1ec4\u1ec2\u1ebc\u0112\u1e14\u1e16\u0114\u0116\xcb\u1eba\u011a\u0204\u0206\u1eb8\u1ec6\u0228\u1e1c\u0118\u1e18\u1e1a\u0190\u018e",
            F: "F\u24bb\uff26\u1e1e\u0191\ua77b",
            G: "G\u24bc\uff27\u01f4\u011c\u1e20\u011e\u0120\u01e6\u0122\u01e4\u0193\ua7a0\ua77d\ua77e",
            H: "H\u24bd\uff28\u0124\u1e22\u1e26\u021e\u1e24\u1e28\u1e2a\u0126\u2c67\u2c75\ua78d",
            I: "I\u24be\uff29\xcc\xcd\xce\u0128\u012a\u012c\u0130\xcf\u1e2e\u1ec8\u01cf\u0208\u020a\u1eca\u012e\u1e2c\u0197",
            J: "J\u24bf\uff2a\u0134\u0248",
            K: "K\u24c0\uff2b\u1e30\u01e8\u1e32\u0136\u1e34\u0198\u2c69\ua740\ua742\ua744\ua7a2",
            L: "L\u24c1\uff2c\u013f\u0139\u013d\u1e36\u1e38\u013b\u1e3c\u1e3a\u0141\u023d\u2c62\u2c60\ua748\ua746\ua780",
            M: "M\u24c2\uff2d\u1e3e\u1e40\u1e42\u2c6e\u019c",
            N: "N\u24c3\uff2e\u01f8\u0143\xd1\u1e44\u0147\u1e46\u0145\u1e4a\u1e48\u0220\u019d\ua790\ua7a4",
            O: "O\u24c4\uff2f\xd2\xd3\xd4\u1ed2\u1ed0\u1ed6\u1ed4\xd5\u1e4c\u022c\u1e4e\u014c\u1e50\u1e52\u014e\u022e\u0230\xd6\u022a\u1ece\u0150\u01d1\u020c\u020e\u01a0\u1edc\u1eda\u1ee0\u1ede\u1ee2\u1ecc\u1ed8\u01ea\u01ec\xd8\u01fe\u0186\u019f\ua74a\ua74c",
            P: "P\u24c5\uff30\u1e54\u1e56\u01a4\u2c63\ua750\ua752\ua754",
            Q: "Q\u24c6\uff31\ua756\ua758\u024a",
            R: "R\u24c7\uff32\u0154\u1e58\u0158\u0210\u0212\u1e5a\u1e5c\u0156\u1e5e\u024c\u2c64\ua75a\ua7a6\ua782",
            S: "S\u24c8\uff33\u1e9e\u015a\u1e64\u015c\u1e60\u0160\u1e66\u1e62\u1e68\u0218\u015e\u2c7e\ua7a8\ua784",
            T: "T\u24c9\uff34\u1e6a\u0164\u1e6c\u021a\u0162\u1e70\u1e6e\u0166\u01ac\u01ae\u023e\ua786",
            U: "U\u24ca\uff35\xd9\xda\xdb\u0168\u1e78\u016a\u1e7a\u016c\xdc\u01db\u01d7\u01d5\u01d9\u1ee6\u016e\u0170\u01d3\u0214\u0216\u01af\u1eea\u1ee8\u1eee\u1eec\u1ef0\u1ee4\u1e72\u0172\u1e76\u1e74\u0244",
            V: "V\u24cb\uff36\u1e7c\u1e7e\u01b2\ua75e\u0245",
            W: "W\u24cc\uff37\u1e80\u1e82\u0174\u1e86\u1e84\u1e88\u2c72",
            X: "X\u24cd\uff38\u1e8a\u1e8c",
            Y: "Y\u24ce\uff39\u1ef2\xdd\u0176\u1ef8\u0232\u1e8e\u0178\u1ef6\u1ef4\u01b3\u024e\u1efe",
            Z: "Z\u24cf\uff3a\u0179\u1e90\u017b\u017d\u1e92\u1e94\u01b5\u0224\u2c7f\u2c6b\ua762",
            a: "a\u24d0\uff41\u1e9a\xe0\xe1\xe2\u1ea7\u1ea5\u1eab\u1ea9\xe3\u0101\u0103\u1eb1\u1eaf\u1eb5\u1eb3\u0227\u01e1\xe4\u01df\u1ea3\xe5\u01fb\u01ce\u0201\u0203\u1ea1\u1ead\u1eb7\u1e01\u0105\u2c65\u0250",
            b: "b\u24d1\uff42\u1e03\u1e05\u1e07\u0180\u0183\u0253",
            c: "c\u24d2\uff43\u0107\u0109\u010b\u010d\xe7\u1e09\u0188\u023c\ua73f\u2184",
            d: "d\u24d3\uff44\u1e0b\u010f\u1e0d\u1e11\u1e13\u1e0f\u0111\u018c\u0256\u0257\ua77a",
            e: "e\u24d4\uff45\xe8\xe9\xea\u1ec1\u1ebf\u1ec5\u1ec3\u1ebd\u0113\u1e15\u1e17\u0115\u0117\xeb\u1ebb\u011b\u0205\u0207\u1eb9\u1ec7\u0229\u1e1d\u0119\u1e19\u1e1b\u0247\u025b\u01dd",
            f: "f\u24d5\uff46\u1e1f\u0192\ua77c",
            g: "g\u24d6\uff47\u01f5\u011d\u1e21\u011f\u0121\u01e7\u0123\u01e5\u0260\ua7a1\u1d79\ua77f",
            h: "h\u24d7\uff48\u0125\u1e23\u1e27\u021f\u1e25\u1e29\u1e2b\u1e96\u0127\u2c68\u2c76\u0265",
            i: "i\u24d8\uff49\xec\xed\xee\u0129\u012b\u012d\xef\u1e2f\u1ec9\u01d0\u0209\u020b\u1ecb\u012f\u1e2d\u0268\u0131",
            j: "j\u24d9\uff4a\u0135\u01f0\u0249",
            k: "k\u24da\uff4b\u1e31\u01e9\u1e33\u0137\u1e35\u0199\u2c6a\ua741\ua743\ua745\ua7a3",
            l: "l\u24db\uff4c\u0140\u013a\u013e\u1e37\u1e39\u013c\u1e3d\u1e3b\u017f\u0142\u019a\u026b\u2c61\ua749\ua781\ua747",
            m: "m\u24dc\uff4d\u1e3f\u1e41\u1e43\u0271\u026f",
            n: "n\u24dd\uff4e\u01f9\u0144\xf1\u1e45\u0148\u1e47\u0146\u1e4b\u1e49\u019e\u0272\u0149\ua791\ua7a5",
            o: "o\u24de\uff4f\xf2\xf3\xf4\u1ed3\u1ed1\u1ed7\u1ed5\xf5\u1e4d\u022d\u1e4f\u014d\u1e51\u1e53\u014f\u022f\u0231\xf6\u022b\u1ecf\u0151\u01d2\u020d\u020f\u01a1\u1edd\u1edb\u1ee1\u1edf\u1ee3\u1ecd\u1ed9\u01eb\u01ed\xf8\u01ff\u0254\ua74b\ua74d\u0275",
            p: "p\u24df\uff50\u1e55\u1e57\u01a5\u1d7d\ua751\ua753\ua755",
            q: "q\u24e0\uff51\u024b\ua757\ua759",
            r: "r\u24e1\uff52\u0155\u1e59\u0159\u0211\u0213\u1e5b\u1e5d\u0157\u1e5f\u024d\u027d\ua75b\ua7a7\ua783",
            s: "s\u24e2\uff53\u015b\u1e65\u015d\u1e61\u0161\u1e67\u1e63\u1e69\u0219\u015f\u023f\ua7a9\ua785\u1e9b",
            t: "t\u24e3\uff54\u1e6b\u1e97\u0165\u1e6d\u021b\u0163\u1e71\u1e6f\u0167\u01ad\u0288\u2c66\ua787",
            u: "u\u24e4\uff55\xf9\xfa\xfb\u0169\u1e79\u016b\u1e7b\u016d\xfc\u01dc\u01d8\u01d6\u01da\u1ee7\u016f\u0171\u01d4\u0215\u0217\u01b0\u1eeb\u1ee9\u1eef\u1eed\u1ef1\u1ee5\u1e73\u0173\u1e77\u1e75\u0289",
            v: "v\u24e5\uff56\u1e7d\u1e7f\u028b\ua75f\u028c",
            w: "w\u24e6\uff57\u1e81\u1e83\u0175\u1e87\u1e85\u1e98\u1e89\u2c73",
            x: "x\u24e7\uff58\u1e8b\u1e8d",
            y: "y\u24e8\uff59\u1ef3\xfd\u0177\u1ef9\u0233\u1e8f\xff\u1ef7\u1e99\u1ef5\u01b4\u024f\u1eff",
            z: "z\u24e9\uff5a\u017a\u1e91\u017c\u017e\u1e93\u1e95\u01b6\u0225\u0240\u2c6c\ua763",
            AA: "\ua732",
            AE: "\xc6\u01fc\u01e2",
            AO: "\ua734",
            AU: "\ua736",
            AV: "\ua738\ua73a",
            AY: "\ua73c",
            DZ: "\u01f1\u01c4",
            Dz: "\u01f2\u01c5",
            LJ: "\u01c7",
            Lj: "\u01c8",
            NJ: "\u01ca",
            Nj: "\u01cb",
            OI: "\u01a2",
            OO: "\ua74e",
            OU: "\u0222",
            TZ: "\ua728",
            VY: "\ua760",
            aa: "\ua733",
            ae: "\xe6\u01fd\u01e3",
            ao: "\ua735",
            au: "\ua737",
            av: "\ua739\ua73b",
            ay: "\ua73d",
            dz: "\u01f3\u01c6",
            hv: "\u0195",
            lj: "\u01c9",
            nj: "\u01cc",
            oi: "\u01a3",
            ou: "\u0223",
            oo: "\ua74f",
            ss: "\xdf",
            tz: "\ua729",
            vy: "\ua761"
        }, G(u, j, m, {
            normalize: function() {
                return Rb || fc(), this.replace(Sb, function(a) {
                    return Rb[a]
                })
            },
            hankaku: function() {
                return dc(this, arguments, Xb, "hankaku")
            },
            zenkaku: function() {
                return dc(this, arguments, Wb, "zenkaku")
            },
            hiragana: function(a) {
                var b = this;
                return a !== m && (b = b.zenkaku("k")), b.replace(/[\u30A1-\u30F6]/g, function(c) {
                    return c.shift(-96)
                })
            },
            katakana: function() {
                return this.replace(/[\u3041-\u3096]/g, function(a) {
                    return a.shift(96)
                })
            }
        }), [{
            ca: ["Arabic"],
            source: "\u0600-\u06ff"
        }, {
            ca: ["Cyrillic"],
            source: "\u0400-\u04ff"
        }, {
            ca: ["Devanagari"],
            source: "\u0900-\u097f"
        }, {
            ca: ["Greek"],
            source: "\u0370-\u03ff"
        }, {
            ca: ["Hangul"],
            source: "\uac00-\ud7af\u1100-\u11ff"
        }, {
            ca: ["Han", "Kanji"],
            source: "\u4e00-\u9fff\uf900-\ufaff"
        }, {
            ca: ["Hebrew"],
            source: "\u0590-\u05ff"
        }, {
            ca: ["Hiragana"],
            source: "\u3040-\u309f\u30fb-\u30fc"
        }, {
            ca: ["Kana"],
            source: "\u3040-\u30ff\uff61-\uff9f"
        }, {
            ca: ["Katakana"],
            source: "\u30a0-\u30ff\uff61-\uff9f"
        }, {
            ca: ["Latin"],
            source: "-\x80-\xff\u0100-\u017f\u0180-\u024f"
        }, {
            ca: ["Thai"],
            source: "\u0e00-\u0e7f"
        }].forEach(function(a) {
            var b = s("^[" + a.source + "\\s]+$"),
                c = s("[" + a.source + "]");
            a.ca.forEach(function(d) {
                ia(u.prototype, "is" + d, function() {
                    return b.test(this.trim())
                }), ia(u.prototype, "has" + d, function() {
                    return c.test(this)
                })
            })
        })
    }(),
    function(window, document, $, undefined) {
        "use strict";
        var H = $("html"),
            W = $(window),
            D = $(document),
            F = $.fancybox = function() {
                F.open.apply(this, arguments)
            },
            IE = navigator.userAgent.match(/msie/i),
            didUpdate = null,
            isTouch = document.createTouch !== undefined,
            isQuery = function(obj) {
                return obj && obj.hasOwnProperty && obj instanceof $
            },
            isString = function(str) {
                return str && "string" === $.type(str)
            },
            isPercentage = function(str) {
                return isString(str) && str.indexOf("%") > 0
            },
            isScrollable = function(el) {
                return el && !(el.style.overflow && "hidden" === el.style.overflow) && (el.clientWidth && el.scrollWidth > el.clientWidth || el.clientHeight && el.scrollHeight > el.clientHeight)
            },
            getScalar = function(orig, dim) {
                var value = parseInt(orig, 10) || 0;
                return dim && isPercentage(orig) && (value = F.getViewport()[dim] / 100 * value), Math.ceil(value)
            },
            getValue = function(value, dim) {
                return getScalar(value, dim) + "px"
            };
        $.extend(F, {
            version: "2.1.5",
            defaults: {
                padding: 15,
                margin: 20,
                width: 800,
                height: 600,
                minWidth: 100,
                minHeight: 100,
                maxWidth: 9999,
                maxHeight: 9999,
                pixelRatio: 1,
                autoSize: !0,
                autoHeight: !1,
                autoWidth: !1,
                autoResize: !0,
                autoCenter: !isTouch,
                fitToView: !0,
                aspectRatio: !1,
                topRatio: .5,
                leftRatio: .5,
                scrolling: "auto",
                wrapCSS: "",
                arrows: !0,
                closeBtn: !0,
                closeClick: !1,
                nextClick: !1,
                mouseWheel: !0,
                autoPlay: !1,
                playSpeed: 3e3,
                preload: 3,
                modal: !1,
                loop: !0,
                ajax: {
                    dataType: "html",
                    headers: {
                        "X-fancyBox": !0
                    }
                },
                iframe: {
                    scrolling: "auto",
                    preload: !0
                },
                swf: {
                    wmode: "transparent",
                    allowfullscreen: "true",
                    allowscriptaccess: "always"
                },
                keys: {
                    next: {
                        13: "left",
                        34: "up",
                        39: "left",
                        40: "up"
                    },
                    prev: {
                        8: "right",
                        33: "down",
                        37: "right",
                        38: "down"
                    },
                    close: [27],
                    play: [32],
                    toggle: [70]
                },
                direction: {
                    next: "left",
                    prev: "right"
                },
                scrollOutside: !0,
                index: 0,
                type: null,
                href: null,
                content: null,
                title: null,
                tpl: {
                    wrap: '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                    image: '<img class="fancybox-image" src="{href}" alt="" />',
                    iframe: '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (IE ? ' allowtransparency="true"' : "") + "></iframe>",
                    error: '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                    closeBtn: '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                    next: '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                    prev: '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>',
                    loading: '<div id="fancybox-loading"><div></div></div>'
                },
                openEffect: "fade",
                openSpeed: 250,
                openEasing: "swing",
                openOpacity: !0,
                openMethod: "zoomIn",
                closeEffect: "fade",
                closeSpeed: 250,
                closeEasing: "swing",
                closeOpacity: !0,
                closeMethod: "zoomOut",
                nextEffect: "elastic",
                nextSpeed: 250,
                nextEasing: "swing",
                nextMethod: "changeIn",
                prevEffect: "elastic",
                prevSpeed: 250,
                prevEasing: "swing",
                prevMethod: "changeOut",
                helpers: {
                    overlay: !0,
                    title: !0
                },
                onCancel: $.noop,
                beforeLoad: $.noop,
                afterLoad: $.noop,
                beforeShow: $.noop,
                afterShow: $.noop,
                beforeChange: $.noop,
                beforeClose: $.noop,
                afterClose: $.noop
            },
            group: {},
            opts: {},
            previous: null,
            coming: null,
            current: null,
            isActive: !1,
            isOpen: !1,
            isOpened: !1,
            wrap: null,
            skin: null,
            outer: null,
            inner: null,
            player: {
                timer: null,
                isActive: !1
            },
            ajaxLoad: null,
            imgPreload: null,
            transitions: {},
            helpers: {},
            open: function(group, opts) {
                return group && ($.isPlainObject(opts) || (opts = {}), !1 !== F.close(!0)) ? ($.isArray(group) || (group = isQuery(group) ? $(group).get() : [group]), $.each(group, function(i, element) {
                    var href, title, content, type, rez, hrefParts, selector, obj = {};
                    "object" === $.type(element) && (element.nodeType && (element = $(element)), isQuery(element) ? (obj = {
                        href: element.data("fancybox-href") || element.attr("href"),
                        title: $("<div/>").text(element.data("fancybox-title") || element.attr("title") || "").html(),
                        isDom: !0,
                        element: element
                    }, $.metadata && $.extend(!0, obj, element.metadata())) : obj = element), href = opts.href || obj.href || (isString(element) ? element : null), title = opts.title !== undefined ? opts.title : obj.title || "", content = opts.content || obj.content, type = content ? "html" : opts.type || obj.type, !type && obj.isDom && (type = element.data("fancybox-type"), type || (rez = element.prop("class").match(/fancybox\.(\w+)/), type = rez ? rez[1] : null)), isString(href) && (type || (F.isImage(href) ? type = "image" : F.isSWF(href) ? type = "swf" : "#" === href.charAt(0) ? type = "inline" : isString(element) && (type = "html", content = element)), "ajax" === type && (hrefParts = href.split(/\s+/, 2), href = hrefParts.shift(), selector = hrefParts.shift())), content || ("inline" === type ? href ? content = $(isString(href) ? href.replace(/.*(?=#[^\s]+$)/, "") : href) : obj.isDom && (content = element) : "html" === type ? content = href : type || href || !obj.isDom || (type = "inline", content = element)), $.extend(obj, {
                        href: href,
                        type: type,
                        content: content,
                        title: title,
                        selector: selector
                    }), group[i] = obj
                }), F.opts = $.extend(!0, {}, F.defaults, opts), opts.keys !== undefined && (F.opts.keys = opts.keys ? $.extend({}, F.defaults.keys, opts.keys) : !1), F.group = group, F._start(F.opts.index)) : void 0
            },
            cancel: function() {
                var coming = F.coming;
                coming && !1 === F.trigger("onCancel") || (F.hideLoading(), coming && (F.ajaxLoad && F.ajaxLoad.abort(), F.ajaxLoad = null, F.imgPreload && (F.imgPreload.onload = F.imgPreload.onerror = null), coming.wrap && coming.wrap.stop(!0, !0).trigger("onReset").remove(), F.coming = null, F.current || F._afterZoomOut(coming)))
            },
            close: function(event) {
                F.cancel(), !1 !== F.trigger("beforeClose") && (F.unbindEvents(), F.isActive && (F.isOpen && event !== !0 ? (F.isOpen = F.isOpened = !1, F.isClosing = !0, $(".fancybox-item, .fancybox-nav").remove(), F.wrap.stop(!0, !0).removeClass("fancybox-opened"), F.transitions[F.current.closeMethod]()) : ($(".fancybox-wrap").stop(!0).trigger("onReset").remove(), F._afterZoomOut())))
            },
            play: function(action) {
                var clear = function() {
                        clearTimeout(F.player.timer)
                    },
                    set = function() {
                        clear(), F.current && F.player.isActive && (F.player.timer = setTimeout(F.next, F.current.playSpeed))
                    },
                    stop = function() {
                        clear(), D.unbind(".player"), F.player.isActive = !1, F.trigger("onPlayEnd")
                    },
                    start = function() {
                        F.current && (F.current.loop || F.current.index < F.group.length - 1) && (F.player.isActive = !0, D.bind({
                            "onCancel.player beforeClose.player": stop,
                            "onUpdate.player": set,
                            "beforeLoad.player": clear
                        }), set(), F.trigger("onPlayStart"))
                    };
                action === !0 || !F.player.isActive && action !== !1 ? start() : stop()
            },
            next: function(direction) {
                var current = F.current;
                current && (isString(direction) || (direction = current.direction.next), F.jumpto(current.index + 1, direction, "next"))
            },
            prev: function(direction) {
                var current = F.current;
                current && (isString(direction) || (direction = current.direction.prev), F.jumpto(current.index - 1, direction, "prev"))
            },
            jumpto: function(index, direction, router) {
                var current = F.current;
                current && (index = getScalar(index), F.direction = direction || current.direction[index >= current.index ? "next" : "prev"], F.router = router || "jumpto", current.loop && (0 > index && (index = current.group.length + index % current.group.length), index %= current.group.length), current.group[index] !== undefined && (F.cancel(), F._start(index)))
            },
            reposition: function(e, onlyAbsolute) {
                var pos, current = F.current,
                    wrap = current ? current.wrap : null;
                wrap && (pos = F._getPosition(onlyAbsolute), e && "scroll" === e.type ? (delete pos.position, wrap.stop(!0, !0).animate(pos, 200)) : (wrap.css(pos), current.pos = $.extend({}, current.dim, pos)))
            },
            update: function(e) {
                var type = e && e.originalEvent && e.originalEvent.type,
                    anyway = !type || "orientationchange" === type;
                anyway && (clearTimeout(didUpdate), didUpdate = null), F.isOpen && !didUpdate && (didUpdate = setTimeout(function() {
                    var current = F.current;
                    current && !F.isClosing && (F.wrap.removeClass("fancybox-tmp"), (anyway || "load" === type || "resize" === type && current.autoResize) && F._setDimension(), "scroll" === type && current.canShrink || F.reposition(e), F.trigger("onUpdate"), didUpdate = null)
                }, anyway && !isTouch ? 0 : 300))
            },
            toggle: function(action) {
                F.isOpen && (F.current.fitToView = "boolean" === $.type(action) ? action : !F.current.fitToView, isTouch && (F.wrap.removeAttr("style").addClass("fancybox-tmp"), F.trigger("onUpdate")), F.update())
            },
            hideLoading: function() {
                D.unbind(".loading"), $("#fancybox-loading").remove()
            },
            showLoading: function() {
                var el, viewport;
                F.hideLoading(), el = $(F.opts.tpl.loading).click(F.cancel).appendTo("body"), D.bind("keydown.loading", function(e) {
                    27 === (e.which || e.keyCode) && (e.preventDefault(), F.cancel())
                }), F.defaults.fixed || (viewport = F.getViewport(), el.css({
                    position: "absolute",
                    top: .5 * viewport.h + viewport.y,
                    left: .5 * viewport.w + viewport.x
                })), F.trigger("onLoading")
            },
            getViewport: function() {
                var locked = F.current && F.current.locked || !1,
                    rez = {
                        x: W.scrollLeft(),
                        y: W.scrollTop()
                    };
                return locked && locked.length ? (rez.w = locked[0].clientWidth, rez.h = locked[0].clientHeight) : (rez.w = isTouch && window.innerWidth ? window.innerWidth : W.width(), rez.h = isTouch && window.innerHeight ? window.innerHeight : W.height()), rez
            },
            unbindEvents: function() {
                F.wrap && isQuery(F.wrap) && F.wrap.unbind(".fb"), D.unbind(".fb"), W.unbind(".fb")
            },
            bindEvents: function() {
                var keys, current = F.current;
                current && (W.bind("orientationchange.fb" + (isTouch ? "" : " resize.fb") + (current.autoCenter && !current.locked ? " scroll.fb" : ""), F.update), keys = current.keys, keys && D.bind("keydown.fb", function(e) {
                    var code = e.which || e.keyCode,
                        target = e.target || e.srcElement;
                    return 27 === code && F.coming ? !1 : void(e.ctrlKey || e.altKey || e.shiftKey || e.metaKey || target && (target.type || $(target).is("[contenteditable]")) || $.each(keys, function(i, val) {
                        return current.group.length > 1 && val[code] !== undefined ? (F[i](val[code]), e.preventDefault(), !1) : $.inArray(code, val) > -1 ? (F[i](), e.preventDefault(), !1) : void 0
                    }))
                }), $.fn.mousewheel && current.mouseWheel && F.wrap.bind("mousewheel.fb", function(e, delta, deltaX, deltaY) {
                    for (var target = e.target || null, parent = $(target), canScroll = !1; parent.length && !(canScroll || parent.is(".fancybox-skin") || parent.is(".fancybox-wrap"));) canScroll = isScrollable(parent[0]), parent = $(parent).parent();
                    0 === delta || canScroll || F.group.length > 1 && !current.canShrink && (deltaY > 0 || deltaX > 0 ? F.prev(deltaY > 0 ? "down" : "left") : (0 > deltaY || 0 > deltaX) && F.next(0 > deltaY ? "up" : "right"), e.preventDefault())
                }))
            },
            trigger: function(event, o) {
                var ret, obj = o || F.coming || F.current;
                if (obj) {
                    if ($.isFunction(obj[event]) && (ret = obj[event].apply(obj, Array.prototype.slice.call(arguments, 1))), ret === !1) return !1;
                    obj.helpers && $.each(obj.helpers, function(helper, opts) {
                        opts && F.helpers[helper] && $.isFunction(F.helpers[helper][event]) && F.helpers[helper][event]($.extend(!0, {}, F.helpers[helper].defaults, opts), obj)
                    })
                }
                D.trigger(event)
            },
            isImage: function(str) {
                return isString(str) && str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)
            },
            isSWF: function(str) {
                return isString(str) && str.match(/\.(swf)((\?|#).*)?$/i)
            },
            _start: function(index) {
                var obj, href, type, margin, padding, coming = {};
                if (index = getScalar(index), obj = F.group[index] || null, !obj) return !1;
                if (coming = $.extend(!0, {}, F.opts, obj), margin = coming.margin, padding = coming.padding, "number" === $.type(margin) && (coming.margin = [margin, margin, margin, margin]), "number" === $.type(padding) && (coming.padding = [padding, padding, padding, padding]), coming.modal && $.extend(!0, coming, {
                        closeBtn: !1,
                        closeClick: !1,
                        nextClick: !1,
                        arrows: !1,
                        mouseWheel: !1,
                        keys: null,
                        helpers: {
                            overlay: {
                                closeClick: !1
                            }
                        }
                    }), coming.autoSize && (coming.autoWidth = coming.autoHeight = !0), "auto" === coming.width && (coming.autoWidth = !0), "auto" === coming.height && (coming.autoHeight = !0), coming.group = F.group, coming.index = index, F.coming = coming, !1 === F.trigger("beforeLoad")) return void(F.coming = null);
                if (type = coming.type, href = coming.href, !type) return F.coming = null, F.current && F.router && "jumpto" !== F.router ? (F.current.index = index, F[F.router](F.direction)) : !1;
                if (F.isActive = !0, ("image" === type || "swf" === type) && (coming.autoHeight = coming.autoWidth = !1, coming.scrolling = "visible"), "image" === type && (coming.aspectRatio = !0), "iframe" === type && isTouch && (coming.scrolling = "scroll"), coming.wrap = $(coming.tpl.wrap).addClass("fancybox-" + (isTouch ? "mobile" : "desktop") + " fancybox-type-" + type + " fancybox-tmp " + coming.wrapCSS).appendTo(coming.parent || "body"), $.extend(coming, {
                        skin: $(".fancybox-skin", coming.wrap),
                        outer: $(".fancybox-outer", coming.wrap),
                        inner: $(".fancybox-inner", coming.wrap)
                    }), $.each(["Top", "Right", "Bottom", "Left"], function(i, v) {
                        coming.skin.css("padding" + v, getValue(coming.padding[i]))
                    }), F.trigger("onReady"), "inline" === type || "html" === type) {
                    if (!coming.content || !coming.content.length) return F._error("content")
                } else if (!href) return F._error("href");
                "image" === type ? F._loadImage() : "ajax" === type ? F._loadAjax() : "iframe" === type ? F._loadIframe() : F._afterLoad()
            },
            _error: function(type) {
                $.extend(F.coming, {
                    type: "html",
                    autoWidth: !0,
                    autoHeight: !0,
                    minWidth: 0,
                    minHeight: 0,
                    scrolling: "no",
                    hasError: type,
                    content: F.coming.tpl.error
                }), F._afterLoad()
            },
            _loadImage: function() {
                var img = F.imgPreload = new Image;
                img.onload = function() {
                    this.onload = this.onerror = null, F.coming.width = this.width / F.opts.pixelRatio, F.coming.height = this.height / F.opts.pixelRatio, F._afterLoad()
                }, img.onerror = function() {
                    this.onload = this.onerror = null, F._error("image")
                }, img.src = F.coming.href, img.complete !== !0 && F.showLoading()
            },
            _loadAjax: function() {
                var coming = F.coming;
                F.showLoading(), F.ajaxLoad = $.ajax($.extend({}, coming.ajax, {
                    url: coming.href,
                    error: function(jqXHR, textStatus) {
                        F.coming && "abort" !== textStatus ? F._error("ajax", jqXHR) : F.hideLoading()
                    },
                    success: function(data, textStatus) {
                        "success" === textStatus && (coming.content = data, F._afterLoad())
                    }
                }))
            },
            _loadIframe: function() {
                var coming = F.coming,
                    iframe = $(coming.tpl.iframe.replace(/\{rnd\}/g, (new Date).getTime())).attr("scrolling", isTouch ? "auto" : coming.iframe.scrolling).attr("src", coming.href);
                $(coming.wrap).bind("onReset", function() {
                    try {
                        $(this).find("iframe").hide().attr("src", "//about:blank").end().empty()
                    } catch (e) {}
                }), coming.iframe.preload && (F.showLoading(), iframe.one("load", function() {
                    $(this).data("ready", 1), isTouch || $(this).bind("load.fb", F.update), $(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show(), F._afterLoad()
                })), coming.content = iframe.appendTo(coming.inner), coming.iframe.preload || F._afterLoad()
            },
            _preloadImages: function() {
                var item, i, group = F.group,
                    current = F.current,
                    len = group.length,
                    cnt = current.preload ? Math.min(current.preload, len - 1) : 0;
                for (i = 1; cnt >= i; i += 1) item = group[(current.index + i) % len], "image" === item.type && item.href && ((new Image).src = item.href)
            },
            _afterLoad: function() {
                var current, content, type, scrolling, href, embed, coming = F.coming,
                    previous = F.current,
                    placeholder = "fancybox-placeholder";
                if (F.hideLoading(), coming && F.isActive !== !1) {
                    if (!1 === F.trigger("afterLoad", coming, previous)) return coming.wrap.stop(!0).trigger("onReset").remove(), void(F.coming = null);
                    switch (previous && (F.trigger("beforeChange", previous), previous.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove()), F.unbindEvents(), current = coming, content = coming.content, type = coming.type, scrolling = coming.scrolling, $.extend(F, {
                        wrap: current.wrap,
                        skin: current.skin,
                        outer: current.outer,
                        inner: current.inner,
                        current: current,
                        previous: previous
                    }), href = current.href, type) {
                        case "inline":
                        case "ajax":
                        case "html":
                            current.selector ? content = $("<div>").html(content).find(current.selector) : isQuery(content) && (content.data(placeholder) || content.data(placeholder, $('<div class="' + placeholder + '"></div>').insertAfter(content).hide()), content = content.show().detach(), current.wrap.bind("onReset", function() {
                                $(this).find(content).length && content.hide().replaceAll(content.data(placeholder)).data(placeholder, !1)
                            }));
                            break;
                        case "image":
                            content = current.tpl.image.replace(/\{href\}/g, href);
                            break;
                        case "swf":
                            content = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + href + '"></param>', embed = "", $.each(current.swf, function(name, val) {
                                content += '<param name="' + name + '" value="' + val + '"></param>', embed += " " + name + '="' + val + '"'
                            }), content += '<embed src="' + href + '" type="application/x-shockwave-flash" width="100%" height="100%"' + embed + "></embed></object>"
                    }
                    isQuery(content) && content.parent().is(current.inner) || current.inner.append(content), F.trigger("beforeShow"), current.inner.css("overflow", "yes" === scrolling ? "scroll" : "no" === scrolling ? "hidden" : scrolling), F._setDimension(), F.reposition(), F.isOpen = !1, F.coming = null, F.bindEvents(), F.isOpened ? previous.prevMethod && F.transitions[previous.prevMethod]() : $(".fancybox-wrap").not(current.wrap).stop(!0).trigger("onReset").remove(), F.transitions[F.isOpened ? current.nextMethod : current.openMethod](), F._preloadImages()
                }
            },
            _setDimension: function() {
                var wPadding, hPadding, wSpace, hSpace, origWidth, origHeight, origMaxWidth, origMaxHeight, ratio, width_, height_, maxWidth_, maxHeight_, iframe, body, viewport = F.getViewport(),
                    steps = 0,
                    canShrink = !1,
                    canExpand = !1,
                    wrap = F.wrap,
                    skin = F.skin,
                    inner = F.inner,
                    current = F.current,
                    width = current.width,
                    height = current.height,
                    minWidth = current.minWidth,
                    minHeight = current.minHeight,
                    maxWidth = current.maxWidth,
                    maxHeight = current.maxHeight,
                    scrolling = current.scrolling,
                    scrollOut = current.scrollOutside ? current.scrollbarWidth : 0,
                    margin = current.margin,
                    wMargin = getScalar(margin[1] + margin[3]),
                    hMargin = getScalar(margin[0] + margin[2]);
                if (wrap.add(skin).add(inner).width("auto").height("auto").removeClass("fancybox-tmp"), wPadding = getScalar(skin.outerWidth(!0) - skin.width()), hPadding = getScalar(skin.outerHeight(!0) - skin.height()), wSpace = wMargin + wPadding, hSpace = hMargin + hPadding, origWidth = isPercentage(width) ? (viewport.w - wSpace) * getScalar(width) / 100 : width, origHeight = isPercentage(height) ? (viewport.h - hSpace) * getScalar(height) / 100 : height, "iframe" === current.type) {
                    if (iframe = current.content, current.autoHeight && 1 === iframe.data("ready")) try {
                        iframe[0].contentWindow.document.location && (inner.width(origWidth).height(9999), body = iframe.contents().find("body"), scrollOut && body.css("overflow-x", "hidden"), origHeight = body.outerHeight(!0))
                    } catch (e) {}
                } else(current.autoWidth || current.autoHeight) && (inner.addClass("fancybox-tmp"), current.autoWidth || inner.width(origWidth), current.autoHeight || inner.height(origHeight), current.autoWidth && (origWidth = inner.width()), current.autoHeight && (origHeight = inner.height()), inner.removeClass("fancybox-tmp"));
                if (width = getScalar(origWidth), height = getScalar(origHeight), ratio = origWidth / origHeight, minWidth = getScalar(isPercentage(minWidth) ? getScalar(minWidth, "w") - wSpace : minWidth), maxWidth = getScalar(isPercentage(maxWidth) ? getScalar(maxWidth, "w") - wSpace : maxWidth), minHeight = getScalar(isPercentage(minHeight) ? getScalar(minHeight, "h") - hSpace : minHeight), maxHeight = getScalar(isPercentage(maxHeight) ? getScalar(maxHeight, "h") - hSpace : maxHeight), origMaxWidth = maxWidth, origMaxHeight = maxHeight, current.fitToView && (maxWidth = Math.min(viewport.w - wSpace, maxWidth), maxHeight = Math.min(viewport.h - hSpace, maxHeight)), maxWidth_ = viewport.w - wMargin, maxHeight_ = viewport.h - hMargin, current.aspectRatio ? (width > maxWidth && (width = maxWidth, height = getScalar(width / ratio)), height > maxHeight && (height = maxHeight, width = getScalar(height * ratio)), minWidth > width && (width = minWidth, height = getScalar(width / ratio)), minHeight > height && (height = minHeight, width = getScalar(height * ratio))) : (width = Math.max(minWidth, Math.min(width, maxWidth)), current.autoHeight && "iframe" !== current.type && (inner.width(width), height = inner.height()), height = Math.max(minHeight, Math.min(height, maxHeight))), current.fitToView)
                    if (inner.width(width).height(height), wrap.width(width + wPadding), width_ = wrap.width(), height_ = wrap.height(), current.aspectRatio)
                        for (;
                            (width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight && !(steps++ > 19);) height = Math.max(minHeight, Math.min(maxHeight, height - 10)), width = getScalar(height * ratio), minWidth > width && (width = minWidth, height = getScalar(width / ratio)), width > maxWidth && (width = maxWidth, height = getScalar(width / ratio)), inner.width(width).height(height), wrap.width(width).height(height), width_ = wrap.width(), height_ = wrap.height();
                    else width = Math.max(minWidth, Math.min(width, width - (width_ - maxWidth_))), height = Math.max(minHeight, Math.min(height, height - (height_ - maxHeight_)));
                scrollOut && "auto" === scrolling && origHeight > height && maxWidth_ > width + wPadding + scrollOut && (width += scrollOut), inner.width(width).height(height), wrap.width(width + wPadding).height(height + hPadding), width_ = wrap.width(), height_ = wrap.height(), canShrink = (width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight, canExpand = current.aspectRatio ? origMaxWidth > width && origMaxHeight > height && origWidth > width && origHeight > height : (origMaxWidth > width || origMaxHeight > height) && (origWidth > width || origHeight > height), $.extend(current, {
                    dim: {
                        width: getValue(width_),
                        height: getValue(height_)
                    },
                    origWidth: origWidth,
                    origHeight: origHeight,
                    canShrink: canShrink,
                    canExpand: canExpand,
                    wPadding: wPadding,
                    hPadding: hPadding,
                    wrapSpace: height_ - skin.outerHeight(!0),
                    skinSpace: skin.height() - height
                }), !iframe && current.autoHeight && height > minHeight && maxHeight > height && !canExpand && inner.height("auto")
            },
            _getPosition: function(onlyAbsolute) {
                var current = F.current,
                    viewport = F.getViewport(),
                    margin = current.margin,
                    width = F.wrap.width() + margin[1] + margin[3],
                    height = F.wrap.height() + margin[0] + margin[2],
                    rez = {
                        position: "absolute",
                        top: margin[0],
                        left: margin[3]
                    };
                return current.autoCenter && current.fixed && !onlyAbsolute && height <= viewport.h && width <= viewport.w ? rez.position = "fixed" : current.locked || (rez.top += viewport.y, rez.left += viewport.x), rez.top = getValue(Math.max(rez.top, rez.top + (viewport.h - height) * current.topRatio)), rez.left = getValue(Math.max(rez.left, rez.left + (viewport.w - width) * current.leftRatio)), rez
            },
            _afterZoomIn: function() {
                var current = F.current;
                current && (F.isOpen = F.isOpened = !0, F.wrap.css("overflow", "visible").addClass("fancybox-opened").hide().show(0), F.update(), (current.closeClick || current.nextClick && F.group.length > 1) && F.inner.css("cursor", "pointer").bind("click.fb", function(e) {
                    $(e.target).is("a") || $(e.target).parent().is("a") || (e.preventDefault(), F[current.closeClick ? "close" : "next"]())
                }), current.closeBtn && $(current.tpl.closeBtn).appendTo(F.skin).bind("click.fb", function(e) {
                    e.preventDefault(), F.close()
                }), current.arrows && F.group.length > 1 && ((current.loop || current.index > 0) && $(current.tpl.prev).appendTo(F.outer).bind("click.fb", F.prev), (current.loop || current.index < F.group.length - 1) && $(current.tpl.next).appendTo(F.outer).bind("click.fb", F.next)), F.trigger("afterShow"), current.loop || current.index !== current.group.length - 1 ? F.opts.autoPlay && !F.player.isActive && (F.opts.autoPlay = !1, F.play(!0)) : F.play(!1))
            },
            _afterZoomOut: function(obj) {
                obj = obj || F.current, $(".fancybox-wrap").trigger("onReset").remove(), $.extend(F, {
                    group: {},
                    opts: {},
                    router: !1,
                    current: null,
                    isActive: !1,
                    isOpened: !1,
                    isOpen: !1,
                    isClosing: !1,
                    wrap: null,
                    skin: null,
                    outer: null,
                    inner: null
                }), F.trigger("afterClose", obj)
            }
        }), F.transitions = {
            getOrigPosition: function() {
                var current = F.current,
                    element = current.element,
                    orig = current.orig,
                    pos = {},
                    width = 50,
                    height = 50,
                    hPadding = current.hPadding,
                    wPadding = current.wPadding,
                    viewport = F.getViewport();
                return !orig && current.isDom && element.is(":visible") && (orig = element.find("img:first"), orig.length || (orig = element)), isQuery(orig) ? (pos = orig.offset(), orig.is("img") && (width = orig.outerWidth(), height = orig.outerHeight())) : (pos.top = viewport.y + (viewport.h - height) * current.topRatio, pos.left = viewport.x + (viewport.w - width) * current.leftRatio), ("fixed" === F.wrap.css("position") || current.locked) && (pos.top -= viewport.y, pos.left -= viewport.x), pos = {
                    top: getValue(pos.top - hPadding * current.topRatio),
                    left: getValue(pos.left - wPadding * current.leftRatio),
                    width: getValue(width + wPadding),
                    height: getValue(height + hPadding)
                }
            },
            step: function(now, fx) {
                var ratio, padding, value, prop = fx.prop,
                    current = F.current,
                    wrapSpace = current.wrapSpace,
                    skinSpace = current.skinSpace;
                ("width" === prop || "height" === prop) && (ratio = fx.end === fx.start ? 1 : (now - fx.start) / (fx.end - fx.start), F.isClosing && (ratio = 1 - ratio), padding = "width" === prop ? current.wPadding : current.hPadding, value = now - padding, F.skin[prop](getScalar("width" === prop ? value : value - wrapSpace * ratio)), F.inner[prop](getScalar("width" === prop ? value : value - wrapSpace * ratio - skinSpace * ratio)))
            },
            zoomIn: function() {
                var current = F.current,
                    startPos = current.pos,
                    effect = current.openEffect,
                    elastic = "elastic" === effect,
                    endPos = $.extend({
                        opacity: 1
                    }, startPos);
                delete endPos.position, elastic ? (startPos = this.getOrigPosition(), current.openOpacity && (startPos.opacity = .1)) : "fade" === effect && (startPos.opacity = .1), F.wrap.css(startPos).animate(endPos, {
                    duration: "none" === effect ? 0 : current.openSpeed,
                    easing: current.openEasing,
                    step: elastic ? this.step : null,
                    complete: F._afterZoomIn
                })
            },
            zoomOut: function() {
                var current = F.current,
                    effect = current.closeEffect,
                    elastic = "elastic" === effect,
                    endPos = {
                        opacity: .1
                    };
                elastic && (endPos = this.getOrigPosition(), current.closeOpacity && (endPos.opacity = .1)), F.wrap.animate(endPos, {
                    duration: "none" === effect ? 0 : current.closeSpeed,
                    easing: current.closeEasing,
                    step: elastic ? this.step : null,
                    complete: F._afterZoomOut
                })
            },
            changeIn: function() {
                var field, current = F.current,
                    effect = current.nextEffect,
                    startPos = current.pos,
                    endPos = {
                        opacity: 1
                    },
                    direction = F.direction,
                    distance = 200;
                startPos.opacity = .1, "elastic" === effect && (field = "down" === direction || "up" === direction ? "top" : "left", "down" === direction || "right" === direction ? (startPos[field] = getValue(getScalar(startPos[field]) - distance), endPos[field] = "+=" + distance + "px") : (startPos[field] = getValue(getScalar(startPos[field]) + distance), endPos[field] = "-=" + distance + "px")), "none" === effect ? F._afterZoomIn() : F.wrap.css(startPos).animate(endPos, {
                    duration: current.nextSpeed,
                    easing: current.nextEasing,
                    complete: F._afterZoomIn
                })
            },
            changeOut: function() {
                var previous = F.previous,
                    effect = previous.prevEffect,
                    endPos = {
                        opacity: .1
                    },
                    direction = F.direction,
                    distance = 200;
                "elastic" === effect && (endPos["down" === direction || "up" === direction ? "top" : "left"] = ("up" === direction || "left" === direction ? "-" : "+") + "=" + distance + "px"), previous.wrap.animate(endPos, {
                    duration: "none" === effect ? 0 : previous.prevSpeed,
                    easing: previous.prevEasing,
                    complete: function() {
                        $(this).trigger("onReset").remove()
                    }
                })
            }
        }, F.helpers.overlay = {
            defaults: {
                closeClick: !0,
                speedOut: 200,
                showEarly: !0,
                css: {},
                locked: !isTouch,
                fixed: !0
            },
            overlay: null,
            fixed: !1,
            el: $("html"),
            create: function(opts) {
                var parent;
                opts = $.extend({}, this.defaults, opts), this.overlay && this.close(), parent = F.coming ? F.coming.parent : opts.parent, this.overlay = $('<div class="fancybox-overlay"></div>').appendTo(parent && parent.lenth ? parent : "body"), this.fixed = !1, opts.fixed && F.defaults.fixed && (this.overlay.addClass("fancybox-overlay-fixed"), this.fixed = !0)
            },
            open: function(opts) {
                var that = this;
                opts = $.extend({}, this.defaults, opts), this.overlay ? this.overlay.unbind(".overlay").width("auto").height("auto") : this.create(opts), this.fixed || (W.bind("resize.overlay", $.proxy(this.update, this)), this.update()), opts.closeClick && this.overlay.bind("click.overlay", function(e) {
                    return $(e.target).hasClass("fancybox-overlay") ? (F.isActive ? F.close() : that.close(), !1) : void 0
                }), this.overlay.css(opts.css).show()
            },
            close: function() {
                W.unbind("resize.overlay"), this.el.hasClass("fancybox-lock") && ($(".fancybox-margin").removeClass("fancybox-margin"), this.el.removeClass("fancybox-lock"), W.scrollTop(this.scrollV).scrollLeft(this.scrollH)), $(".fancybox-overlay").remove().hide(), $.extend(this, {
                    overlay: null,
                    fixed: !1
                })
            },
            update: function() {
                var offsetWidth, width = "100%";
                this.overlay.width(width).height("100%"), IE ? (offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth), D.width() > offsetWidth && (width = D.width())) : D.width() > W.width() && (width = D.width()), this.overlay.width(width).height(D.height())
            },
            onReady: function(opts, obj) {
                var overlay = this.overlay;
                $(".fancybox-overlay").stop(!0, !0), overlay || this.create(opts), opts.locked && this.fixed && obj.fixed && (obj.locked = this.overlay.append(obj.wrap), obj.fixed = !1), opts.showEarly === !0 && this.beforeShow.apply(this, arguments)
            },
            beforeShow: function(opts, obj) {
                obj.locked && !this.el.hasClass("fancybox-lock") && (this.fixPosition !== !1 && $("*").filter(function() {
                    return "fixed" === $(this).css("position") && !$(this).hasClass("fancybox-overlay") && !$(this).hasClass("fancybox-wrap")
                }).addClass("fancybox-margin"), this.el.addClass("fancybox-margin"), this.scrollV = W.scrollTop(), this.scrollH = W.scrollLeft(), this.el.addClass("fancybox-lock"), W.scrollTop(this.scrollV).scrollLeft(this.scrollH)), this.open(opts)
            },
            onUpdate: function() {
                this.fixed || this.update()
            },
            afterClose: function(opts) {
                this.overlay && !F.coming && this.overlay.fadeOut(opts.speedOut, $.proxy(this.close, this))
            }
        }, F.helpers.title = {
            defaults: {
                type: "float",
                position: "bottom"
            },
            beforeShow: function(opts) {
                var title, target, current = F.current,
                    text = current.title,
                    type = opts.type;
                if ($.isFunction(text) && (text = text.call(current.element, current)), isString(text) && "" !== $.trim(text)) {
                    switch (title = $('<div class="fancybox-title fancybox-title-' + type + '-wrap">' + text + "</div>"), type) {
                        case "inside":
                            target = F.skin;
                            break;
                        case "outside":
                            target = F.wrap;
                            break;
                        case "over":
                            target = F.inner;
                            break;
                        default:
                            target = F.skin, title.appendTo("body"), IE && title.width(title.width()), title.wrapInner('<span class="child"></span>'), F.current.margin[2] += Math.abs(getScalar(title.css("margin-bottom")))
                    }
                    title["top" === opts.position ? "prependTo" : "appendTo"](target)
                }
            }
        }, $.fn.fancybox = function(options) {
            var index, that = $(this),
                selector = this.selector || "",
                run = function(e) {
                    var relType, relVal, what = $(this).blur(),
                        idx = index;
                    e.ctrlKey || e.altKey || e.shiftKey || e.metaKey || what.is(".fancybox-wrap") || (relType = options.groupAttr || "data-fancybox-group", relVal = what.attr(relType), relVal || (relType = "rel", relVal = what.get(0)[relType]), relVal && "" !== relVal && "nofollow" !== relVal && (what = selector.length ? $(selector) : that, what = what.filter("[" + relType + '="' + relVal + '"]'), idx = what.index(this)), options.index = idx, F.open(what, options) !== !1 && e.preventDefault())
                };
            return options = options || {}, index = options.index || 0, selector && options.live !== !1 ? D.undelegate(selector, "click.fb-start").delegate(selector + ":not('.fancybox-item, .fancybox-nav')", "click.fb-start", run) : that.unbind("click.fb-start").bind("click.fb-start", run), this.filter("[data-fancybox-start=1]").trigger("click"), this
        }, D.ready(function() {
            var w1, w2;
            $.scrollbarWidth === undefined && ($.scrollbarWidth = function() {
                var parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),
                    child = parent.children(),
                    width = child.innerWidth() - child.height(99).innerWidth();
                return parent.remove(), width
            }), $.support.fixedPosition === undefined && ($.support.fixedPosition = function() {
                var elem = $('<div style="position:fixed;top:20px;"></div>').appendTo("body"),
                    fixed = 20 === elem[0].offsetTop || 15 === elem[0].offsetTop;
                return elem.remove(), fixed
            }()), $.extend(F.defaults, {
                scrollbarWidth: $.scrollbarWidth(),
                fixed: $.support.fixedPosition,
                parent: $("body")
            }), w1 = $(window).width(), H.addClass("fancybox-lock-test"), w2 = $(window).width(), H.removeClass("fancybox-lock-test"), $("<style type='text/css'>.fancybox-margin{margin-right:" + (w2 - w1) + "px;}</style>").appendTo("head")
        })
    }(window, document, jQuery);
var _sf_startpt = (new Date).getTime(),
    _sf_async_config = {
        uid: 40284,
        domain: "stores.jp"
    };
! function() {
   
}();
var _gaq = _gaq || [];
_gaq.push(["_setAccount", "UA-34418151-1"]), _gaq.push(["_setDomainName", "stores.jp"]), "undefined" != typeof STORES_JP && STORES_JP.plan && _gaq.push(["_setCustomVar", 1, "plan", STORES_JP.plan, 1]),
    function() {
        var ga = document.createElement("script");
        ga.type = "text/javascript", ga.async = !0, ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(ga, s)
    }(), angular.module("StoresJpCommon.directives", []), angular.module("StoresJpCommon.directives").directive("gaEvent", ["analytics", function(analytics) {
        return function(scope, element, attrs) {
            var args = scope.$eval(attrs.gaEvent);
            element.on("click", function(e) {
                attrs.href && "_blank" != attrs.target && (e.preventDefault(), analytics.setHitCallback(function() {
                    location.href = attrs.href
                })), analytics.event.apply(null, args)
            })
        }
    }]), angular.module("StoresJpCommon.directives").directive("storesZipCode", function($http) {
        return {
            require: "ngModel",
            restrict: "A",
            link: function(scope, element, attrs) {
                var last_zip = "",
                    address_elm = element.parents().find('[name="address"]'),
                    ship_address_elm = element.parents().find('[name="ship_address"]');
                element.on("keyup", function() {
                    scope.$apply(function() {
                        var val = element.val(),
                            zip = val.hankaku().replace(/\D/g, "");
                        if (7 == zip.length) {
                            if (element.val(zip), last_zip == zip) return;
                            last_zip = zip, $http.get("/zip_codes/" + zip.to(3)).success(function(data) {
                                var prefecture = _.find(scope.preset.prefectures, function(prefecture) {
                                    return prefecture == data[zip][0]
                                });
                                if (prefecture) {
                                    var splits = attrs.ngModel.split("."),
                                        obj = scope.$eval(splits[0]);
                                    obj && (obj.prefecture = prefecture, obj.address = data[zip][1] + data[zip][2], "zip" === document.activeElement.name && address_elm.focus(), "ship_zip" === document.activeElement.name && ship_address_elm.focus())
                                }
                                scope.coupon ? scope.useCoupon(scope.coupon.code) : scope.cart && scope.cart.sum()
                            })
                        }
                    })
                })
            }
        }
    }), angular.module("StoresJpCommon.filters", []), angular.module("StoresJpCommon.filters").filter("abbreviate", function() {
        return function(input, max) {
            if (void 0 != input) {
                void 0 == max && (max = 100);
                var str = String(input);
                if (str.length > max) {
                    var disp = str.substr(0, max);
                    return disp + "\u2026"
                }
                return str
            }
        }
    }), angular.module("StoresJpCommon.filters").filter("hideNumber", function() {
        return function(input, offset) {
            if (void 0 != input) {
                void 0 == offset && (offset = 0);
                for (var disp = "", i = (String(input), input.length - offset); i > 0; i--) disp += "X";
                return disp + input.substr(input.length - offset)
            }
        }
    });
var app = angular.module("StoresJp", ["ngResource", "infinite-scroll", "StoresJpStoreIframe.services", "ui.utils", "StoresJpAddon", "StoresJp.services", "StoresJpCommon.services", "StoresJpCommon.directives", "StoresJpCommon.filters"]).value("uiJqConfig");
app.config(["$httpProvider", function($httpProvider) {
    angular.forEach(["post", "put", "patch", "delete"], function(method) {
        var csrfToken = $("meta[name=csrf-token]").attr("content");
        csrfToken && ($httpProvider.defaults.headers[method] ? $httpProvider.defaults.headers[method]["X-CSRF-Token"] = csrfToken : $httpProvider.defaults.headers[method] = {
            "X-CSRF-Token": csrfToken
        })
    })
}]), app.run(function($location, PostMessage) {
    PostMessage.addAction("changeUrl", function(path, params) {
        params ? (params.redirect_uri || (params.redirect_uri = $location.$$absUrl), location.href = STORES_JP.stores_domain + path + "?" + $.param(params)) : location.href = STORES_JP.stores_domain + path
    }), PostMessage.addAction("openFancybox", function(id) {
        $.fancybox.open(id)
    })
}), angular.module("StoresJp").controller("GiftFormController", ["$scope", "$rootScope", function($scope, $rootScope) {
    $rootScope.shipToSameAddress = !0;
    var default_prefecture = "en" === I18n.locale ? "Please select" : "\u9078\u629e\u3057\u3066\u304f\u3060\u3055\u3044";
    $scope.gift_preset = {
        prefectures: [default_prefecture].concat(I18n.prefectures)
    }, $rootScope.other_shipping = {
        prefecture: $scope.preset.prefectures[0],
        last_name: null,
        first_name: null,
        zip: null,
        address: null,
        tel: null
    }, $scope.giftFormValid = function(field) {
        var required = !1;
        if (null !== field.$modelValue && field.$modelValue && (required = !0), $scope.clicked_submit || field.$dirty) {
            if (field.$invalid) return !0;
            if (!required) return !0
        }
        return !1
    }, $scope.changeSameAddress = function() {
        $rootScope.shipToSameAddress = !$rootScope.shipToSameAddress, $rootScope.cart.sum()
    }
}]), angular.module("StoresJp").controller("ReviewsCtrl", ["$scope", "$routeParams", "$http", function($scope, $routeParams, $http) {
    $scope.I18n = I18n, $scope.item_id = $routeParams.item_id, $http.get("/items/" + $scope.item_id + "/reviews").success(function(res) {
        $scope.item = res.item, $scope.reviews = res.reviews, setTimeout(function() {
            $(".default-review").raty({
                score: function() {
                    return $(this).attr("data-score")
                },
                readOnly: !0,
                width: 200,
                height: 16
            })
        }, 0)
    })
}]), angular.module("StoresJp").controller("ReviewsEditCtrl", ["$scope", "$location", "$routeParams", "$http", function($scope, $location, $routeParams, $http) {
    $scope.I18n = I18n, $scope.item_id = $routeParams.item_id, $scope.clicked_submit = !1, $scope.review_key = $location.search().review_key, $scope.review_key || $location.url("/"), $http.get("/items/" + $scope.item_id).success(function(res) {
        $scope.item = res;
        var images = $scope.item.images[0].name.split(".");
        //$scope.item_image = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + images[0] + "_50x50." + images[1], $scope.submit = function() {
        $scope.item_image = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + images[0] + "." + images[1], $scope.submit = function() {
            $scope.clicked_submit || ($scope.clicked_submit = !0, $scope.form.$valid !== !1 && ($scope.review.item_id = $scope.item_id, $scope.review.review_key = $scope.review_key, $scope.review.score = $scope.rate, $scope.pending = !0, $http.post("/create_review", {
                review: $scope.review
            }).success(function() {
                $location.url("/items/" + $scope.item_id + "/reviews")
            }).error(function(res) {
                $scope.error = res, $scope.pending = !1
            })))
        }, $scope.click_star = function() {
            $scope.rate = $("*[name=score]").val()
        }
    })
}]), app.directive("storesDate", function() {
    return {
        require: "?ngModel",
        link: function(scope, element, attrs, controller) {
            var defaultAttrs = {
                    format: "Y/m/d",
                    days: ["\u65e5", "\u6708", "\u706b", "\u6c34", "\u6728", "\u91d1", "\u571f"],
                    months: ["1\u6708", "2\u6708", "3\u6708", "4\u6708", "5\u6708", "6\u6708", "7\u6708", "8\u6708", "9\u6708", "10\u6708", "11\u6708", "12\u6708"],
                    onSelect: function(v) {
                        controller.$setViewValue(v), controller.$render()
                    }
                },
                obj = scope.$eval(attrs.storesDate);
            obj && (obj.pair && (obj.pair = $(obj.pair)), angular.extend(defaultAttrs, obj)), _.delay(function() {
                element.Zebra_DatePicker(defaultAttrs)
            }, 300)
        }
    }
}), app.directive("storesJwysiwyg", function() {
    return {
        require: "?ngModel",
        link: function(scope, element, attrs, controller) {
            element.wysiwyg({
                rmUnusedControls: !0,
                initialContent: null,
                controls: {
                    bold: {
                        visible: !0
                    },
                    italic: {
                        visible: !0
                    },
                    insertUnorderedList: {
                        visible: !0
                    },
                    insertOrderedList: {
                        visible: !0
                    },
                    createLink: {
                        visible: !0
                    }
                },
                events: {
                    keyup: function() {
                        controller.$setViewValue(element.val())
                    }
                }
            }), element.prev().find(".toolbar").click(function() {
                controller.$setViewValue(element.val())
            })
        }
    }
}), app.directive("storesMax", function() {
    return {
        require: "ngModel",
        restrict: "A",
        link: function(scope, element, attrs, controller) {
            var max = parseInt(attrs.storesMax, 10);
            controller.$parsers.unshift(function(viewValue) {
                return !viewValue || parseInt(viewValue, 10) <= max ? (controller.$setValidity("storesMax", !0), viewValue) : (controller.$setValidity("storesMax", !1), viewValue)
            })
        }
    }
}), app.directive("storesMin", function() {
    return {
        require: "ngModel",
        restrict: "A",
        link: function(scope, element, attrs, controller) {
            var min = parseInt(attrs.storesMin, 10);
            controller.$parsers.unshift(function(viewValue) {
                return !viewValue || parseInt(viewValue, 10) >= min ? (controller.$setValidity("storesMin", !0), viewValue) : (controller.$setValidity("storesMin", !1), viewValue)
            })
        }
    }
}), app.directive("ngIf", [function() {
    return {
        transclude: "element",
        priority: 600,
        terminal: !0,
        restrict: "A",
        $$tlb: !0,
        compile: function($element, $attr, $transclude) {
            return function($scope, $element, $attr) {
                var block, childScope;
                $scope.$watch($attr.ngIf, function(value) {
                    value ? childScope || (childScope = $scope.$new(), $transclude(childScope, function(clone) {
                        clone[clone.length++] = document.createComment(" end ngIf: " + $attr.ngIf + " "), block = {
                            clone: clone
                        }, angular.element($element).after(clone)
                    })) : (childScope && (childScope.$destroy(), childScope = null), block && (angular.element(block.clone).remove(), block = null))
                })
            }
        }
    }
}]), app.directive("storesNumeric", function() {
    return {
        require: "ngModel",
        restrict: "A",
        link: function(scope, element, attrs, controller) {
            element.bind("keyup", function(e) {
                13 === e.keyCode && (controller.$setViewValue(parseInt(function(num) {
                    return num.replace(/[\uff10-\uff19]/g, function(n) {
                        return String.fromCharCode(n.charCodeAt(0) - 65248)
                    }).replace(/\D/g, "")
                }(controller.$modelValue.toString()), 10)), controller.$render())
            })
        }
    }
}), app.directive("storesRequired", function() {
    return {
        require: "ngModel",
        restrict: "A",
        link: function(scope, element, attrs, controller) {
            scope.$watch(attrs.storesRequired, function(newValue) {
                if (newValue) {
                    var v = controller.$modelValue;
                    null === v || void 0 === v || "string" == typeof v && 0 === v.length ? controller.$setValidity("storesRequired", !1) : controller.$setValidity("storesRequired", !0), angular.forEach(controller.$parsers, function(validator) {
                        validator(v)
                    })
                } else angular.forEach(controller.$error, function(v, k) {
                    controller.$setValidity(k, !0)
                })
            }), controller.$parsers.unshift(function(viewValue) {
                return scope.$eval(attrs.storesRequired) && "string" == typeof viewValue && !viewValue.length ? (controller.$setValidity("storesRequired", !1), viewValue) : (controller.$setValidity("storesRequired", !0), viewValue)
            })
        }
    }
}), app.directive("zipCodeSeparate", function($http) {
    return {
        require: "ngModel",
        restrict: "A",
        link: function(scope, element, attrs) {
            {
                var last_zip = "",
                    address_elm = element.parents().find('[id="address"]');
                element.parents().find('[id="zip2"]')
            }
            element.on("keyup", function() {
                scope.$apply(function() {
                    var val = document.getElementById("zip1").value + document.getElementById("zip2").value,
                        zip = val.hankaku().replace(/\D/g, "");
                    if (7 == zip.length) {
                        if (last_zip == zip) return;
                        last_zip = zip, $http.get("/zip_codes/" + zip.to(3)).success(function(data) {
                            var prefecture = _.find(scope.preset.prefectures, function(prefecture) {
                                return prefecture == data[zip][0]
                            });
                            if (prefecture) {
                                var splits = attrs.ngModel.split("."),
                                    obj = scope.$eval(splits[0]);
                                obj && (obj.prefecture = prefecture, obj.address1 = data[zip][1], obj.address2 = data[zip][2], address_elm.focus())
                            }
                        })
                    }
                })
            })
        }
    }
}), app.factory("conversionTag", [function() {
    function append_tags(conversions) {
        var def = $.Deferred(),
            promises = [];
        for (var key in conversions) conversion_func[key] && promises.push(conversion_func[key].apply(this, conversions[key]));
        return $.when.apply(this, promises).done(function() {
            def.resolve()
        }), def
    }
    var conversion_func = {};
    return conversion_func.google_conversion = function(id, label) {
        var def = $.Deferred(),
            init_script_tag = document.createElement("script");
        init_script_tag.innerHTML = ["/* <![CDATA[ */", "var google_conversion_id = " + id + ";", 'var google_conversion_language = "en";', 'var google_conversion_format = "3";', 'var google_conversion_color = "ffffff";', 'var google_conversion_label = "' + label + '";', "var google_conversion_value = 0;", "/* ]]> */"].join("\n");
        var noscript_tag = document.createElement("noscript");
        noscript_tag.innerHTML = ['<div style="display:inline;">', '<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/' + id + "/?value=0&amp;label=" + label + '&amp;guid=ON&amp;script=0">', "</div>"].join("\n");
        var conversion_script_tag = document.createElement("script");
        return conversion_script_tag.src = "//www.googleadservices.com/pagead/conversion.js", conversion_script_tag.onload = function() {
            def.resolve()
        }, document.body.appendChild(init_script_tag), document.body.appendChild(noscript_tag), document.body.appendChild(conversion_script_tag), def
    }, conversion_func.google_remarketing = function(id, label) {
        var def = $.Deferred(),
            init_script_tag = document.createElement("script");
        init_script_tag.innerHTML = ["/* <![CDATA[ */", "var google_conversion_id = " + id + ";", 'var google_conversion_label = "' + label + '";', "var google_custom_params = window.google_tag_params;", "var google_remarketing_only = true;", "/* ]]> */"].join("\n");
        var noscript_tag = document.createElement("noscript");
        noscript_tag.innerHTML = ['<div style="display:inline;">', '<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/' + id + "/?value=0&amp;label=" + label + '&amp;guid=ON&amp;script=0"/>', "</div>"].join("\n");
        var conversion_script_tag = document.createElement("script");
        return conversion_script_tag.src = "//www.googleadservices.com/pagead/conversion.js", conversion_script_tag.onload = function() {
            def.resolve()
        }, document.body.appendChild(init_script_tag), document.body.appendChild(noscript_tag), document.body.appendChild(conversion_script_tag), def
    }, conversion_func.yahoo_conversion = function(id, label) {
        var def = $.Deferred(),
            init_script_tag = document.createElement("script");
        init_script_tag.innerHTML = ["/* <![CDATA[ */", "var yahoo_conversion_id = " + id + ";", 'var yahoo_conversion_label = "' + label + '";', "var yahoo_conversion_value = 0;", "/* ]]> */"].join("\n");
        var noscript_tag = document.createElement("noscript");
        noscript_tag.innerHTML = ['<div style="display:inline;">', '<img height="1" width="1" style="border-style:none;" alt="" src="//b91.yahoo.co.jp/pagead/conversion/' + id + "/?value=0&amp;label=" + label + '&amp;guid=ON&amp;script=0&amp;disvt=true"/>', "</div>"].join("\n");
        var conversion_script_tag = document.createElement("script");
        return conversion_script_tag.src = "https://s.yimg.jp/images/listing/tool/cv/conversion.js", conversion_script_tag.onload = function() {
            def.resolve()
        }, document.body.appendChild(init_script_tag), document.body.appendChild(noscript_tag), document.body.appendChild(conversion_script_tag), def
    }, conversion_func.yahoo_remarketing = function(id, label) {
        var def = $.Deferred(),
            init_script_tag = document.createElement("script");
        init_script_tag.innerHTML = ["/* <![CDATA[ */", 'var yahoo_retargeting_id = "' + id + '";', 'var yahoo_conversion_label = "' + label + '";', "/* ]]> */"].join("\n");
        var conversion_script_tag = document.createElement("script");
        return conversion_script_tag.src = "//b92.yahoo.co.jp/js/s_retargeting.js", conversion_script_tag.onload = function() {
            def.resolve()
        }, document.body.appendChild(init_script_tag), document.body.appendChild(conversion_script_tag), def
    }, conversion_func.yahoo_listing = function(account_id, transaction_id, amount) {
        var def = $.Deferred();
        if ("https:" == location.protocol) var protocol = "https:";
        else var protocol = "http:";
        var img = document.createElement("img");
        return img.src = protocol + "//b90.yahoo.co.jp/c?account_id=" + account_id + "&transaction_id=" + transaction_id + "&amount=" + amount, img.width = 1, img.height = 1, img.border = 0, img.onload = function() {
            def.resolve()
        }, document.body.appendChild(img), def
    }, conversion_func.a8_conversion = function(id, name) {
        var def = $.Deferred(),
            img = document.createElement("img");
        return img.src = "https://px.a8.net/cgi-bin/a8fly/sales?pid=" + id + "&so=" + name + "&si=1.1.1.a8", img.onload = function() {
            def.resolve()
        }, document.body.appendChild(img), def
    }, {
        append_tags: append_tags
    }
}]);
var services = angular.module("StoresJp.services", ["ngResource"]);
services.factory("DeliveryMethod", ["$resource", function($resource) {
        return $resource("/store/:user/delivery_methods/:id", {
            user: "@user",
            id: "@id"
        }, {
            update: {
                method: "PUT",
                params: {},
                isArray: !1
            }
        })
    }]),
    function() {
        app.factory("StoresUtil", function() {
            function is_mobile() {
                return /iphone|ipod|android.*mobile/.test(navigator.userAgent.toLowerCase())
            }
            return {
                is_mobile: is_mobile
            }
        })
    }(), app.factory("checkout", function($rootScope, $http, analytics, optimizely, storesJpAddonUtility) {
        return {
            beforeSubmit: function() {
                $rootScope.state = "wait", $rootScope.cart.items[0].digital_contents && ($rootScope.is_digit = !0);
                var data = {
                    items: $rootScope.cart.items,
                    customer: $rootScope.customer
                };
                $rootScope.coupon && (data.coupon = $rootScope.coupon.code);
                var enableGiftForm = storesJpAddonUtility.isEnableAddon("gift_form");
                return enableGiftForm && !$rootScope.shipToSameAddress && (data.other_shipping = $rootScope.other_shipping), data
            },
            submitCallback: function(res) {
                if ($("form").remove(), $(window).scrollTop(0), res.wellnet && ($rootScope.data = res.wellnet, $rootScope.limit_date = res.pay_limit), res.promotion_tag) {
                    var promotion_tag = angular.element("<div/>").html(res.promotion_tag).text();
                    angular.element("#promotion_tag").append(promotion_tag)
                }
                $rootScope.step = 3, $rootScope.order_id = res._id, $rootScope.order_items = res.items, $rootScope.state = "done", analytics.pageview("/#!/checkout_complete"), ga(function() {
                    ga.getByName("owner") && ga("owner.send", "pageview", "/#!/checkout_complete")
                }), analytics.event("consumer", "order", "done"), _gaq.push(["_addTrans", res._id, res.store_name, res.total, res.coupon, res.shipping_fee, res.address, res.prefecture]);
                for (var i = 0; i < res.items.length; ++i) {
                    var item = res.items[i];
                    _gaq.push(["_addItem", res._id, item._id, item.n, item.v, item.p, item.q])
                }
                _gaq.push(["_trackTrans"]), window.optimizely = window.optimizely || [], window.optimizely.push(["trackEvent", "order_done"]), $rootScope.customer.cc && $rootScope.customer.cc.company && analytics.event("credit", "company", $rootScope.customer.cc.company), $rootScope.register_user_results = res.register_user_results, res.register_user_results.result === !0 && analytics.event("user", "signup", "order"), "credit" === $rootScope.customer.payment_method[0] && optimizely.event("credit_order_done"), $rootScope.cart.empty_cart(), delete $rootScope.$root.customer, delete $rootScope.$root.misc
            },
            submit: function(data, successCallback, errorCallback) {
                $http.post("/orders", {
                    authenticity_token: AUTH_TOKEN,
                    store_name: USER_NAME,
                    data: data
                }).success(successCallback).error(errorCallback)
            },
            updateToPending: function(data, successCallback, errorCallback) {
                $http.put("/orders/" + ORDER_ID + "/pending", {
                    authenticity_token: AUTH_TOKEN,
                    store_name: USER_NAME,
                    data: data
                }).success(successCallback).error(errorCallback)
            }
        }
    }), app.factory("creditCard", [function() {
        function company_by_number(number) {
            switch (number += "", !0) {
                case !!number.match(/^4[0-9]{12}(?:[0-9]{3})?$/):
                    return VISA;
                case !!number.match(/^5[1-5][0-9]{14}$/):
                    return MASTER;
                case !!number.match(/^3[47][0-9]{13}$/):
                    return AMEX
            }
        }
        var VISA = "visa",
            MASTER = "master",
            AMEX = "amex";
        return {
            company_by_number: company_by_number
        }
    }]),
    function() {
        var module = angular.module("StoresJpAddon", ["ngResource"]);
        module.directive("spInclude", ["$compile", "storesJpAddonUtility", function($compile, util) {
            return {
                restrict: "E",
                link: function(scope, element, attrs) {
                    util.isEnableAddon(attrs.addon) !== !1 && element.html($compile('<div ng-include="' + attrs.template + '" ng-controller="' + attrs.controller + '"></div>')(scope))
                }
            }
        }]), module.directive("spGrip", ["storesJpAddonUtility", function(Util) {
            return {
                restrict: "AE",
                scope: !0,
                replace: !0,
                compile: function(element, attrs) {
                    return element.html(attrs.mobile ? '<div class="switch" ng-click="toggleAddon()"><p class="status first" ng-class="{active: !isEnableAddon(), deactive: isEnableAddon()}">OFF</p><p class="status second" ng-class="{active: isEnableAddon(), deactive: !isEnableAddon()}">ON</p></div>' : '<div class="switch" ng-click="toggleAddon()"><p class="status active" ng-show="isEnableAddon()">ON</p><p class="status deactive" ng-hide="isEnableAddon()">OFF</p><p class="grip"></p></div>'),
                        function(scope, element, attrs) {
                            scope.addon = attrs.addon, scope.isEnableAddon = function() {
                                return Util.isEnableAddon(scope.addon)
                            }, scope.toggleAddon = function() {
                                if (scope.isEnableAddon()) Util.disableAddon(scope.addon);
                                else {
                                    if ("free" === STORES_JP.plan && attrs.premium && (!scope.user_info.mybook_user || scope.user_info.mybook_user && "secret" !== scope.addon)) return void $("#popup_premium_button a").click();
                                    if ("detail_shipping_fee" === scope.addon) return void $("#popup_alert_shipping_button a").click();
                                    Util.enableAddon(scope.addon).then(null, function(res) {
                                        403 === res.status ? $("#popup_premium_button a").click() : 422 === res.status && res.data.errors && _.has(res.data.errors, "mybook_english") && alert(res.data.errors.mybook_english)
                                    })
                                }
                            }, scope.$watch("isEnableAddon()", function(v) {
                                element.find($("p.grip")).animate({
                                    left: v ? "57px" : "2px"
                                }, "fast", "swing")
                            })
                        }
                }
            }
        }]), module.directive("spShow", ["storesJpAddonUtility", function(util) {
            return {
                link: function(scope, element, attrs) {
                    scope.$watch(function() {
                        return util.isEnableAddon(attrs.spShow || attrs.addon)
                    }, function(v) {
                        v ? element.show() : element.hide()
                    })
                }
            }
        }]), module.directive("spHide", ["storesJpAddonUtility", function(util) {
            return {
                link: function(scope, element, attrs) {
                    util.isEnableAddon(attrs.spHide || attrs.addon) ? element.hide() : element.show()
                }
            }
        }]), module.directive("spIf", ["storesJpAddonUtility", function(util) {
            return {
                compile: function(element, attrs) {
                    util.isEnableAddon(attrs.spIf || attrs.addon) === !1 && element.remove()
                }
            }
        }]), module.directive("spController", ["$controller", "storesJpAddonUtility", function($controller, util) {
            return {
                link: function(scope, element, attrs) {
                    util.isEnableAddon(attrs.addon) !== !1 && $controller(attrs.spController, {
                        $scope: scope
                    })
                }
            }
        }]), module.factory("Addon", ["$resource", function($resource) {
            return $resource("/store_addons/:addon", {
                addon: "@addon"
            }, {
                update: {
                    method: "PUT"
                }
            })
        }]), module.factory("storesJpAddonUtility", ["$q", "Addon", function($q, Addon) {
            function isEnableAddon(addon) {
                return $.inArray(addon, addons) >= 0
            }

            function enableAddons() {
                return addons
            }

            function enableAddon(addon_key) {
                var delay = $q.defer(),
                    addon = new Addon({
                        addon: addon_key
                    });
                return addon.$update(function(data) {
                    addons = data.addons, delay.resolve(data.addons)
                }, function(data) {
                    delay.reject(data)
                }), delay.promise
            }

            function disableAddon(addon_key) {
                var delay = $q.defer(),
                    addon = new Addon({
                        addon: addon_key
                    });
                return addon.$remove(function() {
                    addons = _.without(addons, addon_key), delay.resolve(addons)
                }, function() {
                    delay.reject("delete addon error")
                }), delay.promise
            }
            var addons = STORES_JP.enable_addons || [];
            return {
                isEnableAddon: isEnableAddon,
                enableAddons: enableAddons,
                enableAddon: enableAddon,
                disableAddon: disableAddon
            }
        }]), module.run(["$rootScope", "$location", "storesJpAddonUtility", function($rootScope, $location, util) {
            $rootScope.$on("$routeChangeStart", function(scope, next) {
                next.$route.requiredAddon && util.isEnableAddon(next.$route.requiredAddon) === !1 && $location.url("/")
            })
        }])
    }(), app.run(function($rootScope, $http, $routeParams, analytics, DeliveryMethod, storesJpAddonUtility) {
        ! function() {
            $http.get("/store_style?name=" + USER_NAME).success(function(data) {
                $rootScope.styles = data, data.logo && ($rootScope.logo_src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + data.logo), data.display.frame ? $rootScope.styles.css = {
                    items: {
                        background: "#fff"
                    }
                } : ($rootScope.styles.css = {
                    item_inner: {
                        margin: 0
                    }
                }, $rootScope.styles["class"] = {
                    item_inner: "frame_none"
                });
                var font_callback = function(res) {
                    var css = document.getElementById("font_css");
                    "css" == res.type && (css.textContent = res.data)
                };
                "typesquare" == $rootScope.styles.store_font.type && Ts.dynamicCss(font_callback, $rootScope.styles.name, $rootScope.styles.store_font.style, "logo_font", "", "");
                var URL_PATH_PATTENT = 'img/samples/'
                var url_path_background = (data.background.image);
                var main_url_path = '';
                var is_original_background_image = !1;
                if (url_path_background != null && url_path_background.indexOf(URL_PATH_PATTENT) > -1) {
                    main_url_path = '/' + url_path_background;
                    is_original_background_image = !1;
                } else {
                    main_url_path = "/files/" + USER_NAME + "/" +url_path_background;
                    is_original_background_image = !0;
                };
                $( "<style> body {background-color:"+ data.background.color +"; background-image:url("+main_url_path+");}#store_logo a, #navi_main a, #category_title, .step > p {color:"+data.text_color.store+"; text-decoration:none;}#store_logo a {font-family:"+data.store_font.style+"; font-weight:"+data.store_font.weight+";}.items a {color:"+data.text_color.item+";}#store_logo a {font-size:44px;}</style>" ).appendTo("head");
            })
        }(),
        function() {
            $http.head("/store/" + USER_NAME + "/about").success(function() {
                $rootScope.hasAbout = !0
            }).error(function() {
                $rootScope.hasAbout = !1
            })
        }(),
        function() {
            $http.get("/store/" + USER_NAME + "/categories").success(function(data) {
                $rootScope.categories = data
                //console.log($rootScope)
            }).error(function() {
                $rootScope.categories = null
            })
        }(),
        function() {
            $http.get("/store/" + USER_NAME + "/virtual_store").success(function(data) {
                $rootScope.virtualStore = data, $rootScope.showVirtualStore = data.enable && data.url
            }).error(function() {
                $rootScope.virtualStore = null, $rootScope.showVirtualStore = !1
            })
        }(),
        function() {
            $http.get("/store/" + USER_NAME + "/shipping_fee").success(function(data) {
                $rootScope.shipping_fee = data
            })
        }(),
        function() {
            DeliveryMethod.query({
                user: USER_NAME
            }, function(methods) {
                $rootScope.deliveryMethods = methods
            })
        }(),
        function(cartName) {
            var shippingAddress = function() {
                    var shippingInfo = null;
                    return shippingInfo = storesJpAddonUtility.isEnableAddon("gift_form") && !$rootScope.shipToSameAddress ? $rootScope.other_shipping : $rootScope.customer, shippingInfo ? shippingInfo.prefecture : null
                },
                calcDeliveryMethodShippingFee = function() {
                    var added_methods = [],
                        fees = [];
                    return angular.forEach($rootScope.cart.items, function(item) {
                        var method = _.find($rootScope.deliveryMethods, function(method) {
                            return method.id === item.delivery_method_id
                        });
                        if (method) {
                            var yet_added_method = !_.contains(added_methods, method.id);
                            if (yet_added_method) {
                                var fee = method.default_fee,
                                    shipping_address = shippingAddress();
                                if (shipping_address) {
                                    var area = _.find(method.areas, function(area) {
                                        return area.name === shipping_address
                                    });
                                    area && (fee = area.fee)
                                }
                                fees.push(fee), added_methods.push(method.id)
                            }
                        }
                    }), $rootScope.shipping_fee.delivery_method_option.bundle ? _.max(fees, function(fee) {
                        return fee
                    }) : _.reduce(fees, function(memo, fee) {
                        return memo + fee
                    }, 0)
                };
            $rootScope.cart = {
                items: localStorage[cartName] ? angular.fromJson(localStorage[cartName]) : [],
                checkout: function() {
                    $location.path("/checkouts/destination")
                },
                add: function(item_info, stocks, market_key) {
                    market_key = market_key || null, window.optimizely = window.optimizely || [], window.optimizely.push(["trackEvent", "add_cart"]), analytics.event("cart", "add");
                    for (var is_add_item_digit = !!item_info.digital_contents, is_add_mybook_item = !!item_info.mybook_item, length = $rootScope.cart.items.length, i = 0; length > i; i++) {
                        var is_cart_item_digit = !!$rootScope.cart.items[i].digital_contents,
                            is_cart_mybook_item = !!$rootScope.cart.items[i].mybook_item;
                        if (is_add_item_digit != is_cart_item_digit) return alert("\u30c0\u30a6\u30f3\u30ed\u30fc\u30c9\u5546\u54c1\u3068\u7269\u8ca9\u5546\u54c1\u306f\u540c\u3058\u30ab\u30fc\u30c8\u306b\u5165\u308c\u308b\u3053\u3068\u304c\u51fa\u6765\u307e\u305b\u3093\u3002\u5927\u5909\u7533\u3057\u8a33\u3054\u3056\u3044\u307e\u305b\u3093\u304c\u3001\u30ab\u30fc\u30c8\u5185\u306e\u5546\u54c1\u3092\u5148\u306b\u3054\u8cfc\u5165\u3044\u305f\u3060\u3044\u3066\u304b\u3089\u3001\u6539\u3081\u3066\u3054\u8cfc\u5165\u3044\u305f\u3060\u3051\u307e\u3059\u3088\u3046\u304a\u9858\u3044\u81f4\u3057\u307e\u3059\u3002"), !1;
                        if (is_add_mybook_item != is_cart_mybook_item) return alert("Mybook\u306e\u5546\u54c1\u3068\u7269\u8ca9\u5546\u54c1\u306f\u540c\u3058\u30ab\u30fc\u30c8\u306b\u5165\u308c\u308b\u3053\u3068\u304c\u51fa\u6765\u307e\u305b\u3093\u3002\u5927\u5909\u7533\u3057\u8a33\u3054\u3056\u3044\u307e\u305b\u3093\u304c\u3001\u30ab\u30fc\u30c8\u5185\u306e\u5546\u54c1\u3092\u5148\u306b\u3054\u8cfc\u5165\u3044\u305f\u3060\u3044\u3066\u304b\u3089\u3001\u6539\u3081\u3066\u3054\u8cfc\u5165\u3044\u305f\u3060\u3051\u307e\u3059\u3088\u3046\u304a\u9858\u3044\u81f4\u3057\u307e\u3059\u3002"), !1
                    }
                    var addQuantityNumber = _.reduce(_.values(stocks), function(memo, num) {
                        return memo + parseInt(num, 10)
                    }, 0);
                    if (0 === addQuantityNumber) return alert("en" == I18n.locale ? "Please specify the quantity." : "\u8cfc\u5165\u500b\u6570\u3092\u6307\u5b9a\u3057\u3066\u304f\u3060\u3055\u3044"), !1;
                    _.each(stocks, function(stock_quantity, stock_variation) {
                        for (stock_infinite_status = !1, "null" == stock_variation && (stock_variation = null), i = 0; i < item_info.quantities.length; i++) item_info.quantities[i].variation == stock_variation && (stock_infinite_status = item_info.quantities[i].infinite_status);
                        stock_quantity = parseInt(stock_quantity, 10);
                        var item = _.find($rootScope.cart.items, function(item) {
                            return item.item_id == $routeParams.item_id && item.variation == stock_variation
                        });
                        if (item) {
                            {
                                var item_quantity = _.find($rootScope.item.quantities, function(quantity) {
                                    return quantity.variation == item.variation
                                });
                                _.find($rootScope.item.quantities, function(quantity) {
                                    return quantity.variation == item.variation ? item.infinite_status : void 0
                                })
                            }
                            item_quantity.quantity >= item.quantity + stock_quantity && (item.quantity += stock_quantity)
                        } else if (stock_quantity) {
                            var image_name = item_info.images[0].name.split(".");
                            //item_info.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "_50x50." + image_name[1];
                            item_info.images[0].src = STORES_JP.FILE_SERVER_URL + "/files/" + USER_NAME + "/" + image_name[0] + "." + image_name[1];
                            var delivery_method_id = item_info.delivery_method ? item_info.delivery_method.id : null;
                            $rootScope.cart.items.push({
                                item_id: item_info.id,
                                name: item_info.name,
                                price: item_info.price,
                                quantity: stock_quantity,
                                infinite_status: stock_infinite_status,
                                variation: stock_variation,
                                image: item_info.images[0],
                                digital_contents: item_info.digital_contents,
                                shipping_fee: item_info.shipping_fee,
                                mybook_item: item_info.mybook_item,
                                delivery_method_id: delivery_method_id
                            })
                        }
                        $rootScope.cart.refresh_quantity(), $rootScope.cart.sum(), localStorage[cartName] = angular.toJson($rootScope.cart.items)
                    });
                    var iframe = window.frames.stores_iframe;
                    iframe && iframe.postMessage(localStorage.cart, "*"), market_key || $("#cart_button a").click()
                },
                remove: function(item) {
                    analytics.event("cart", "remove"), $rootScope.cart.items = _.reject($rootScope.cart.items, function(_item) {
                        return _item == item
                    }), localStorage[cartName] = angular.toJson($rootScope.cart.items);
                    var iframe = window.frames.stores_iframe;
                    iframe && iframe.postMessage(localStorage.cart, "*"), $rootScope.cart.refresh_quantity() ? ($rootScope.coupon && $rootScope.useCoupon($rootScope.coupon.code), $rootScope.cart.sum()) : location.href = "/"
                },
                sum: function() {
                    var shipping_fee = $rootScope.$root.shipping_fee,
                        sub_total = 0,
                        payment_method = $rootScope.customer && $rootScope.customer.payment_method;
                    if (receive_method = $rootScope.customer && $rootScope.customer.receive_method, this.shipping_fee = 0, $rootScope.cart.items.length) {
                        if ($rootScope.cart.items[0].digital_contents || payment_method && "recieve_counter" === payment_method[0] || receive_method && "store" === receive_method.key) this.shipping_fee = 0;
                        else if ($rootScope.cart.items[0].mybook_item) this.shipping_fee = 432;
                        else switch (shipping_fee.type) {
                            case "fix":
                                this.shipping_fee = shipping_fee.default_shipping_fee;
                                break;
                            case "delivery_method":
                                this.shipping_fee = calcDeliveryMethodShippingFee()
                        }
                        sub_total = _.reduce(_.map($rootScope.cart.items, function(item) {
                            return item.price * item.quantity
                        }), function(memo, price) {
                            return memo + price
                        }), this.sub_total = sub_total, null !== shipping_fee.free_shipping && sub_total >= shipping_fee.free_shipping ? (this.total = sub_total, this.shipping_fee = 0) : this.total = sub_total + this.shipping_fee, payment_method && (this.total += payment_method[2]), $rootScope.coupon && (this.total -= $rootScope.coupon.price)
                    } else this.total = this.shipping_fee
                },
                refresh_quantity: function() {
                    return this.quantity = $rootScope.cart.items.length ? _.reduce($rootScope.cart.items, function(memo, item) {
                        return memo + item.quantity
                    }, 0) : 0, this.quantity
                },
                empty_cart: function() {
                    this.items = [], window.localStorage.removeItem(cartName), this.quantity = 0
                },
                null_to_hyphen: function(text) {
                    return text || "-"
                },
                quantity: 0
            }
        }("undefined" == typeof CART_NAME ? "cart" : CART_NAME),
        function() {
            $rootScope.$watch("shipping_fee", function(v) {
                v && ($rootScope.cart.sum(), $rootScope.cart.refresh_quantity())
            })
        }()
    }), angular.module("StoresJpStoreIframe.services", ["ngResource"]), angular.module("StoresJpStoreIframe.services").factory("CurrentUser", ["$q", "$resource", function($q, $resource) {
        var deferred = $q.defer();
        return $resource("/current_user").get(null, function(res) {
            deferred.resolve(res)
        }, function(res) {
            deferred.reject(res.data)
        }), deferred.promise
    }]), angular.module("StoresJpCommon.services", ["ngResource"]), angular.module("StoresJpCommon.services").factory("AccountInfo", ["$resource", function($resource) {
        return $resource("/account_info")
    }]), angular.module("StoresJpCommon.services").factory("analytics", function() {
        function setHitCallback(func) {
            angular.isFunction(func) === !0 && _gaq.push(["_set", "hitCallback", func])
        }

        function pageview(path) {
            _gaq.push(["_trackPageview", path])
        }

        function event() {
            var args = Array.prototype.slice.call(arguments);
            _gaq.push(["_trackEvent"].concat(args))
        }
        return {
            setHitCallback: setHitCallback,
            pageview: pageview,
            event: event
        }
    }), angular.module("StoresJpCommon.services").factory("FavoriteItems", ["$resource", function($resource) {
        return $resource("/api/v1/favorite_items/:item_id", {
            item_id: "@item_id"
        }, {})
    }]), angular.module("StoresJpCommon.services").factory("Following", ["$resource", function($resource) {
        return $resource("/api/v1/following/:name", {
            name: "@name"
        }, {})
    }]), angular.module("StoresJpCommon.services").factory("optimizely", function() {
        function activate(experiment_id) {
            opt.push(["activate", experiment_id])
        }

        function event(event_name) {
            opt.push(["trackEvent", event_name])
        }
        var opt = window.optimizely || [];
        return {
            activate: activate,
            event: event
        }
    }), angular.module("StoresJpCommon.services").factory("PostMessage", ["$window", function() {
        function _init() {
            $(window).on("message", function(event) {
                if (STORES_JP && event.originalEvent.origin === STORES_JP.stores_domain) {
                    var data, data_json = event.originalEvent.data;
                    try {
                        data = JSON.parse(data_json)
                    } catch (e) {
                        return
                    }
                    var func = actions[data.action];
                    angular.isFunction(func) !== !1 && func.apply(null, data.args_arr)
                }
            })
        }

        function addAction(key, func) {
            actions[key] = func
        }

        function sendMessage(target, action, args_arr) {
            target.postMessage(JSON.stringify({
                action: action,
                args_arr: args_arr || []
            }), "*")
        }
        var actions = {};
        return _init(), {
            addAction: addAction,
            sendMessage: sendMessage
        }
    }]), angular.module("StoresJpCommon.services").factory("Profile", ["$resource", function($resource) {
        return $resource("/profile/:user_name", {
            user_name: "@user_name"
        }, {})
    }]), angular.module("StoresJpCommon.services").factory("ProfileAddress", ["$resource", function($resource) {
        return $resource("/profile_address")
    }]), angular.module("StoresJpCommon.services").factory("UserBank", ["$resource", function($resource) {
        return $resource("/bank")
    }]), angular.module("StoresJpCommon.services").factory("UserCc", ["$resource", function($resource) {
        return $resource("/user_cc")
    }]), angular.module("StoresJpCommon.services").factory("UserInfo", ["$resource", function($resource) {
        return $resource("/user_info")
    }]), angular.module("StoresJpStoreIframe", ["StoresJpStoreIframe.services", "StoresJpStoreIframe.directives", "StoresJpCommon.services"]).config(["$httpProvider", function($httpProvider) {
        angular.forEach(["post", "put", "patch", "delete"], function(method) {
            var csrtToken = $("meta[name=csrf-token]").attr("content");
            csrtToken && ($httpProvider.defaults.headers[method] ? $httpProvider.defaults.headers[method]["X-CSRF-Token"] = csrtToken : $httpProvider.defaults.headers[method] = {
                "X-CSRF-Token": csrtToken
            })
        })
    }]), angular.module("StoresJpStoreIframe").controller("FavoriteItemCtrl", ["$scope", "FavoriteItemInfo", "FavoriteItems", "ParentLocation", "analytics", function($scope, FavoriteItemInfo, FavoriteItems, ParentLocation, analytics) {
        $scope.add = function() {
            var favorite_items = new FavoriteItems;
            favorite_items.$save({
                item_id: $scope.itemId
            }, function() {
                $scope.isFavoriteItem = !0, $scope.favoriteCount += 1, analytics.event("item", "favorite", $scope.itemId)
            }, function(res) {
                401 === res.status && ParentLocation.changeUrl("/login", {
                    redirect_uri: "/#!/"
                })
            })
        }, $scope.remove = function() {
            var favorite_items = new FavoriteItems;
            favorite_items.$remove({
                item_id: $scope.itemId
            }, function() {
                $scope.isFavoriteItem = !1, $scope.favoriteCount -= 1, analytics.event("item", "unfavorite", $scope.itemId)
            }, function(res) {
                401 === res.status && ParentLocation.changeUrl("/login", {
                    redirect_uri: "/#!/"
                })
            })
        }
    }]), angular.module("StoresJpStoreIframe").controller("UserCtrl", ["$scope", "Following", "ParentLocation", "$window", "analytics", "PostMessage", function($scope, Following, ParentLocation, $window, analytics, PostMessage) {
        function followAnalyticsEvent(action) {
            "undefined" == typeof $scope.position && ($scope.position = "none"), analytics.event("store", action + "_" + $scope.position, $scope.storeName)
        }
        $scope.parent_fancybox_open = function(id) {
            $window.parent && PostMessage.sendMessage($window.parent, "openFancybox", [id])
        }, $scope.follow = function() {
            var following = new Following;
            following.$save({
                name: $scope.storeName
            }, function() {
                $scope.isFollowing = !0, followAnalyticsEvent("follow")
            }, function(res) {
                401 === res.status && ParentLocation.changeUrl("/login", {
                    redirect_uri: "/#!/"
                })
            })
        }, $scope.unfollow = function() {
            var following = new Following;
            following.$remove({
                name: $scope.storeName
            }, function() {
                $scope.isFollowing = !1, followAnalyticsEvent("unfollow")
            }, function(res) {
                401 === res.status && ParentLocation.changeUrl("/login", {
                    redirect_uri: "/#!/"
                })
            })
        }
    }]), angular.module("StoresJpStoreIframe.directives", []), angular.module("StoresJpStoreIframe.directives").directive("ngIf", [function() {
        return {
            transclude: "element",
            priority: 600,
            terminal: !0,
            restrict: "A",
            $$tlb: !0,
            compile: function($element, $attr, $transclude) {
                return function($scope, $element, $attr) {
                    var block, childScope;
                    $scope.$watch($attr.ngIf, function(value) {
                        value ? childScope || (childScope = $scope.$new(), $transclude(childScope, function(clone) {
                            clone[clone.length++] = document.createComment(" end ngIf: " + $attr.ngIf + " "), block = {
                                clone: clone
                            }, angular.element($element).after(clone)
                        })) : (childScope && (childScope.$destroy(), childScope = null), block && (angular.element(block.clone).remove(), block = null))
                    })
                }
            }
        }
    }]), angular.module("StoresJpStoreIframe.directives").directive("parentHref", ["ParentLocation", function(ParentLocation) {
        return {
            link: function(scope, element, attrs) {
                var attr_params = scope.$eval(attrs.parentHref);
                element.on("click", function(e) {
                    e.preventDefault(), ParentLocation.changeUrl(attr_params.url, attr_params.params)
                })
            }
        }
    }]), angular.module("StoresJpStoreIframe.services", ["ngResource"]), angular.module("StoresJpStoreIframe.services").factory("CurrentUser", ["$q", "$resource", function($q, $resource) {
        var deferred = $q.defer();
        return $resource("/current_user").get(null, function(res) {
            deferred.resolve(res)
        }, function(res) {
            deferred.reject(res.data)
        }), deferred.promise
    }]), angular.module("StoresJpStoreIframe.services").factory("FavoriteItemInfo", ["$resource", function($resource) {
        return $resource("/favorite_item_info/:item_id", {
            item_id: "@item_id"
        }, {})
    }]), angular.module("StoresJpStoreIframe.services").factory("ParentLocation", ["$window", "PostMessage", function($window, PostMessage) {
        function changeUrl(path, params) {
            $window.parent && PostMessage.sendMessage($window.parent, "changeUrl", [path, params])
        }
        return {
            changeUrl: changeUrl
        }
    }]);
var mod;
mod = angular.module("infinite-scroll", []), mod.directive("infiniteScroll", ["$rootScope", "$window", "$timeout", function(i, n, e) {
    return {
        link: function(t, l, o) {
            var r, c, f, a;
            return n = angular.element(n), f = 0, null != o.infiniteScrollDistance && t.$watch(o.infiniteScrollDistance, function(i) {
                return f = parseInt(i, 10)
            }), a = !0, r = !1, null != o.infiniteScrollDisabled && t.$watch(o.infiniteScrollDisabled, function(i) {
                return a = !i, a && r ? (r = !1, c()) : void 0
            }), c = function() {
                var e, c, u, d;
                return d = n.height() + n.scrollTop(), e = l.offset().top + l.height(), c = e - d, u = n.height() * f >= c, u && a ? i.$$phase ? t.$eval(o.infiniteScroll) : t.$apply(o.infiniteScroll) : u ? r = !0 : void 0
            }, n.on("scroll", c), t.$on("$destroy", function() {
                return n.off("scroll", c)
            }), e(function() {
                return o.infiniteScrollImmediateCheck ? t.$eval(o.infiniteScrollImmediateCheck) ? c() : void 0 : c()
            }, 0)
        }
    }
}]), jQuery.fn.autolink = function(target) {
    return null == target && (target = "_blank"), this.each(function() {
        var reLink = /((http|https|ftp):\/\/[\w?=&.\/-;#!~%-]+(?![\w\s?&.\/;#~%"=-]*>))/g,
            reNewline = /\x0D\x0A|\x0D|\x0A/g,
            reBr = /&lt;br \/&gt;/g;
        $(this).text($(this).text().replace(reNewline, "<br />")), $(this).html($(this).html().replace(reBr, "<br />").replace(reLink, '<a href="$1" target="' + target + '">$1</a><br />'))
    })
};
var userAgent = window.navigator.userAgent.toLowerCase(),
    appVersion = window.navigator.appVersion.toLowerCase(),
    uaName = "unknown",
    mobile_flag = !1,
    ios = "",
    ios_ver = "",
    ie_flag = !1;
if (-1 != userAgent.indexOf("msie")) uaName = "ie", ie_flag = !0, -1 != appVersion.indexOf("msie 6.") ? uaName = "ie6" : -1 != appVersion.indexOf("msie 7.") ? uaName = "ie7" : -1 != appVersion.indexOf("msie 8.") ? uaName = "ie8" : -1 != appVersion.indexOf("msie 9.") ? uaName = "ie9" : -1 != appVersion.indexOf("msie 10.") && (uaName = "ie10");
else if (-1 != userAgent.indexOf("iphone note")) uaName = "iphone", mobile_flag = !0;
else if (-1 != userAgent.indexOf("iphone")) {
    uaName = "iphone", mobile_flag = !0;
    var ios = navigator.appVersion.match(/OS (\d+)_(\d+)_?(\d+)?/);
    ios_ver = [parseInt(ios[1], 10), parseInt(ios[2], 10), parseInt(ios[3] || 0, 10)]
} else -1 != userAgent.indexOf("ipad") ? uaName = "ipad" : -1 != userAgent.indexOf("ipod") ? (mobile_flag = !0, uaName = "ipod") : -1 != userAgent.indexOf("android") ? (-1 != userAgent.indexOf("mobile") && (mobile_flag = !0), uaName = "android") : -1 != userAgent.indexOf("Android") ? (-1 != userAgent.indexOf("mobile") && (mobile_flag = !0), uaName = "Android") : -1 != userAgent.indexOf("chrome") ? uaName = "chrome" : -1 != userAgent.indexOf("safari") ? uaName = "safari" : -1 != userAgent.indexOf("gecko") ? uaName = "firefox" : -1 != userAgent.indexOf("opera") ? uaName = "opera" : -1 != userAgent.indexOf("mobile") && -1 != userAgent.indexOf("ipad") == 0 && (mobile_flag = !0, uaName = "mobile");
angular.module("ui.alias", []).config(["$compileProvider", "uiAliasConfig", function(a, b) {
        b = b || {}, angular.forEach(b, function(b, c) {
            angular.isString(b) && (b = {
                replace: !0,
                template: b
            }), a.directive(c, function() {
                return b
            })
        })
    }]), angular.module("ui.event", []).directive("uiEvent", ["$parse", function(a) {
        return function(b, c, d) {
            var e = b.$eval(d.uiEvent);
            angular.forEach(e, function(d, e) {
                var f = a(d);
                c.bind(e, function(a) {
                    var c = Array.prototype.slice.call(arguments);
                    c = c.splice(1), f(b, {
                        $event: a,
                        $params: c
                    }), b.$$phase || b.$apply()
                })
            })
        }
    }]), angular.module("ui.format", []).filter("format", function() {
        return function(a, b) {
            var c = a;
            if (angular.isString(c) && void 0 !== b)
                if (angular.isArray(b) || angular.isObject(b) || (b = [b]), angular.isArray(b)) {
                    var d = b.length,
                        e = function(a, c) {
                            return c = parseInt(c, 10), c >= 0 && d > c ? b[c] : a
                        };
                    c = c.replace(/\$([0-9]+)/g, e)
                } else angular.forEach(b, function(a, b) {
                    c = c.split(":" + b).join(a)
                });
            return c
        }
    }), angular.module("ui.highlight", []).filter("highlight", function() {
        return function(a, b, c) {
            return b || angular.isNumber(b) ? (a = a.toString(), b = b.toString(), c ? a.split(b).join('<span class="ui-match">' + b + "</span>") : a.replace(new RegExp(b, "gi"), '<span class="ui-match">$&</span>')) : a
        }
    }), angular.module("ui.include", []).directive("uiInclude", ["$http", "$templateCache", "$anchorScroll", "$compile", function(a, b, c, d) {
        return {
            restrict: "ECA",
            terminal: !0,
            compile: function(e, f) {
                var g = f.uiInclude || f.src,
                    h = f.fragment || "",
                    i = f.onload || "",
                    j = f.autoscroll;
                return function(e, f) {
                    function k() {
                        var k = ++m,
                            o = e.$eval(g),
                            p = e.$eval(h);
                        o ? a.get(o, {
                            cache: b
                        }).success(function(a) {
                            if (k === m) {
                                l && l.$destroy(), l = e.$new();
                                var b;
                                b = p ? angular.element("<div/>").html(a).find(p) : angular.element("<div/>").html(a).contents(), f.html(b), d(b)(l), !angular.isDefined(j) || j && !e.$eval(j) || c(), l.$emit("$includeContentLoaded"), e.$eval(i)
                            }
                        }).error(function() {
                            k === m && n()
                        }) : n()
                    }
                    var l, m = 0,
                        n = function() {
                            l && (l.$destroy(), l = null), f.html("")
                        };
                    e.$watch(h, k), e.$watch(g, k)
                }
            }
        }
    }]), angular.module("ui.indeterminate", []).directive("uiIndeterminate", [function() {
        return {
            compile: function(a, b) {
                return b.type && "checkbox" === b.type.toLowerCase() ? function(a, b, c) {
                    a.$watch(c.uiIndeterminate, function(a) {
                        b[0].indeterminate = !!a
                    })
                } : angular.noop
            }
        }
    }]), angular.module("ui.inflector", []).filter("inflector", function() {
        function a(a) {
            return a.replace(/^([a-z])|\s+([a-z])/g, function(a) {
                return a.toUpperCase()
            })
        }

        function b(a, b) {
            return a.replace(/[A-Z]/g, function(a) {
                return b + a
            })
        }
        var c = {
            humanize: function(c) {
                return a(b(c, " ").split("_").join(" "))
            },
            underscore: function(a) {
                return a.substr(0, 1).toLowerCase() + b(a.substr(1), "_").toLowerCase().split(" ").join("_")
            },
            variable: function(b) {
                return b = b.substr(0, 1).toLowerCase() + a(b.split("_").join(" ")).substr(1).split(" ").join("")
            }
        };
        return function(a, b) {
            return b !== !1 && angular.isString(a) ? (b = b || "humanize", c[b](a)) : a
        }
    }), angular.module("ui.jq", []).value("uiJqConfig", {}).directive("uiJq", ["uiJqConfig", "$timeout", function(a, b) {
        return {
            restrict: "A",
            compile: function(c, d) {
                if (!angular.isFunction(c[d.uiJq])) throw new Error('ui-jq: The "' + d.uiJq + '" function does not exist');
                var e = a && a[d.uiJq];
                return function(a, c, d) {
                    function f() {
                        b(function() {
                            c[d.uiJq].apply(c, g)
                        }, 0, !1)
                    }
                    var g = [];
                    d.uiOptions ? (g = a.$eval("[" + d.uiOptions + "]"), angular.isObject(e) && angular.isObject(g[0]) && (g[0] = angular.extend({}, e, g[0]))) : e && (g = [e]), d.ngModel && c.is("select,input,textarea") && c.bind("change", function() {
                        c.trigger("input")
                    }), d.uiRefresh && a.$watch(d.uiRefresh, function() {
                        f()
                    }), f()
                }
            }
        }
    }]), angular.module("ui.keypress", []).factory("keypressHelper", ["$parse", function(a) {
        var b = {
                8: "backspace",
                9: "tab",
                13: "enter",
                27: "esc",
                32: "space",
                33: "pageup",
                34: "pagedown",
                35: "end",
                36: "home",
                37: "left",
                38: "up",
                39: "right",
                40: "down",
                45: "insert",
                46: "delete"
            },
            c = function(a) {
                return a.charAt(0).toUpperCase() + a.slice(1)
            };
        return function(d, e, f, g) {
            var h, i = [];
            h = e.$eval(g["ui" + c(d)]), angular.forEach(h, function(b, c) {
                var d, e;
                e = a(b), angular.forEach(c.split(" "), function(a) {
                    d = {
                        expression: e,
                        keys: {}
                    }, angular.forEach(a.split("-"), function(a) {
                        d.keys[a] = !0
                    }), i.push(d)
                })
            }), f.bind(d, function(a) {
                var c = !(!a.metaKey || a.ctrlKey),
                    f = !!a.altKey,
                    g = !!a.ctrlKey,
                    h = !!a.shiftKey,
                    j = a.keyCode;
                "keypress" === d && !h && j >= 97 && 122 >= j && (j -= 32), angular.forEach(i, function(d) {
                    var i = d.keys[b[j]] || d.keys[j.toString()],
                        k = !!d.keys.meta,
                        l = !!d.keys.alt,
                        m = !!d.keys.ctrl,
                        n = !!d.keys.shift;
                    i && k === c && l === f && m === g && n === h && e.$apply(function() {
                        d.expression(e, {
                            $event: a
                        })
                    })
                })
            })
        }
    }]), angular.module("ui.keypress").directive("uiKeydown", ["keypressHelper", function(a) {
        return {
            link: function(b, c, d) {
                a("keydown", b, c, d)
            }
        }
    }]), angular.module("ui.keypress").directive("uiKeypress", ["keypressHelper", function(a) {
        return {
            link: function(b, c, d) {
                a("keypress", b, c, d)
            }
        }
    }]), angular.module("ui.keypress").directive("uiKeyup", ["keypressHelper", function(a) {
        return {
            link: function(b, c, d) {
                a("keyup", b, c, d)
            }
        }
    }]), angular.module("ui.mask", []).value("uiMaskConfig", {
        maskDefinitions: {
            9: /\d/,
            A: /[a-zA-Z]/,
            "*": /[a-zA-Z0-9]/
        }
    }).directive("uiMask", ["uiMaskConfig", function(a) {
        return {
            priority: 100,
            require: "ngModel",
            restrict: "A",
            compile: function() {
                var b = a;
                return function(a, c, d, e) {
                    function f(a) {
                        return angular.isDefined(a) ? (s(a), N ? (k(), l(), !0) : j()) : j()
                    }

                    function g(a) {
                        angular.isDefined(a) && (D = a, N && w())
                    }

                    function h(a) {
                        return N ? (G = o(a || ""), I = n(G), e.$setValidity("mask", I), I && G.length ? p(G) : void 0) : a
                    }

                    function i(a) {
                        return N ? (G = o(a || ""), I = n(G), e.$viewValue = G.length ? p(G) : "", e.$setValidity("mask", I), "" === G && void 0 !== e.$error.required && e.$setValidity("required", !1), I ? G : void 0) : a
                    }

                    function j() {
                        return N = !1, m(), angular.isDefined(P) ? c.attr("placeholder", P) : c.removeAttr("placeholder"), angular.isDefined(Q) ? c.attr("maxlength", Q) : c.removeAttr("maxlength"), c.val(e.$modelValue), e.$viewValue = e.$modelValue, !1
                    }

                    function k() {
                        G = K = o(e.$modelValue || ""), H = J = p(G), I = n(G);
                        var a = I && G.length ? H : "";
                        d.maxlength && c.attr("maxlength", 2 * B[B.length - 1]), c.attr("placeholder", D), c.val(a), e.$viewValue = a
                    }

                    function l() {
                        O || (c.bind("blur", t), c.bind("mousedown mouseup", u), c.bind("input keyup click focus", w), O = !0)
                    }

                    function m() {
                        O && (c.unbind("blur", t), c.unbind("mousedown", u), c.unbind("mouseup", u), c.unbind("input", w), c.unbind("keyup", w), c.unbind("click", w), c.unbind("focus", w), O = !1)
                    }

                    function n(a) {
                        return a.length ? a.length >= F : !0
                    }

                    function o(a) {
                        var b = "",
                            c = C.slice();
                        return a = a.toString(), angular.forEach(E, function(b) {
                            a = a.replace(b, "")
                        }), angular.forEach(a.split(""), function(a) {
                            c.length && c[0].test(a) && (b += a, c.shift())
                        }), b
                    }

                    function p(a) {
                        var b = "",
                            c = B.slice();
                        return angular.forEach(D.split(""), function(d, e) {
                            a.length && e === c[0] ? (b += a.charAt(0) || "_", a = a.substr(1), c.shift()) : b += d
                        }), b
                    }

                    function q(a) {
                        var b = d.placeholder;
                        return "undefined" != typeof b && b[a] ? b[a] : "_"
                    }

                    function r() {
                        return D.replace(/[_]+/g, "_").replace(/([^_]+)([a-zA-Z0-9])([^_])/g, "$1$2_$3").split("_")
                    }

                    function s(a) {
                        var b = 0;
                        if (B = [], C = [], D = "", "string" == typeof a) {
                            F = 0;
                            var c = !1,
                                d = a.split("");
                            angular.forEach(d, function(a, d) {
                                R.maskDefinitions[a] ? (B.push(b), D += q(d), C.push(R.maskDefinitions[a]), b++, c || F++) : "?" === a ? c = !0 : (D += a, b++)
                            })
                        }
                        B.push(B.slice().pop() + 1), E = r(), N = B.length > 1 ? !0 : !1
                    }

                    function t() {
                        L = 0, M = 0, I && 0 !== G.length || (H = "", c.val(""), a.$apply(function() {
                            e.$setViewValue("")
                        }))
                    }

                    function u(a) {
                        "mousedown" === a.type ? c.bind("mouseout", v) : c.unbind("mouseout", v)
                    }

                    function v() {
                        M = A(this), c.unbind("mouseout", v)
                    }

                    function w(b) {
                        b = b || {};
                        var d = b.which,
                            f = b.type;
                        if (16 !== d && 91 !== d) {
                            var g, h = c.val(),
                                i = J,
                                j = o(h),
                                k = K,
                                l = !1,
                                m = y(this) || 0,
                                n = L || 0,
                                q = m - n,
                                r = B[0],
                                s = B[j.length] || B.slice().shift(),
                                t = M || 0,
                                u = A(this) > 0,
                                v = t > 0,
                                w = h.length > i.length || t && h.length > i.length - t,
                                C = h.length < i.length || t && h.length === i.length - t,
                                D = d >= 37 && 40 >= d && b.shiftKey,
                                E = 37 === d,
                                F = 8 === d || "keyup" !== f && C && -1 === q,
                                G = 46 === d || "keyup" !== f && C && 0 === q && !v,
                                H = (E || F || "click" === f) && m > r;
                            if (M = A(this), !D && (!u || "click" !== f && "keyup" !== f)) {
                                if ("input" === f && C && !v && j === k) {
                                    for (; F && m > r && !x(m);) m--;
                                    for (; G && s > m && -1 === B.indexOf(m);) m++;
                                    var I = B.indexOf(m);
                                    j = j.substring(0, I) + j.substring(I + 1), l = !0
                                }
                                for (g = p(j), J = g, K = j, c.val(g), l && a.$apply(function() {
                                        e.$setViewValue(j)
                                    }), w && r >= m && (m = r + 1), H && m--, m = m > s ? s : r > m ? r : m; !x(m) && m > r && s > m;) m += H ? -1 : 1;
                                (H && s > m || w && !x(n)) && m++, L = m, z(this, m)
                            }
                        }
                    }

                    function x(a) {
                        return B.indexOf(a) > -1
                    }

                    function y(a) {
                        if (!a) return 0;
                        if (void 0 !== a.selectionStart) return a.selectionStart;
                        if (document.selection) {
                            a.focus();
                            var b = document.selection.createRange();
                            return b.moveStart("character", -a.value.length), b.text.length
                        }
                        return 0
                    }

                    function z(a, b) {
                        if (!a) return 0;
                        if (0 !== a.offsetWidth && 0 !== a.offsetHeight)
                            if (a.setSelectionRange) a.focus(), a.setSelectionRange(b, b);
                            else if (a.createTextRange) {
                            var c = a.createTextRange();
                            c.collapse(!0), c.moveEnd("character", b), c.moveStart("character", b), c.select()
                        }
                    }

                    function A(a) {
                        return a ? void 0 !== a.selectionStart ? a.selectionEnd - a.selectionStart : document.selection ? document.selection.createRange().text.length : 0 : 0
                    }
                    var B, C, D, E, F, G, H, I, J, K, L, M, N = !1,
                        O = !1,
                        P = d.placeholder,
                        Q = d.maxlength,
                        R = {};
                    d.uiOptions ? (R = a.$eval("[" + d.uiOptions + "]"), angular.isObject(R[0]) && (R = function(a, b) {
                        for (var c in a) Object.prototype.hasOwnProperty.call(a, c) && (b[c] ? angular.extend(b[c], a[c]) : b[c] = angular.copy(a[c]));
                        return b
                    }(b, R[0]))) : R = b, d.$observe("uiMask", f), d.$observe("placeholder", g), e.$formatters.push(h), e.$parsers.push(i), c.bind("mousedown mouseup", u), Array.prototype.indexOf || (Array.prototype.indexOf = function(a) {
                        if (null === this) throw new TypeError;
                        var b = Object(this),
                            c = b.length >>> 0;
                        if (0 === c) return -1;
                        var d = 0;
                        if (arguments.length > 1 && (d = Number(arguments[1]), d !== d ? d = 0 : 0 !== d && 1 / 0 !== d && d !== -1 / 0 && (d = (d > 0 || -1) * Math.floor(Math.abs(d)))), d >= c) return -1;
                        for (var e = d >= 0 ? d : Math.max(c - Math.abs(d), 0); c > e; e++)
                            if (e in b && b[e] === a) return e;
                        return -1
                    })
                }
            }
        }
    }]), angular.module("ui.reset", []).value("uiResetConfig", null).directive("uiReset", ["uiResetConfig", function(a) {
        var b = null;
        return void 0 !== a && (b = a), {
            require: "ngModel",
            link: function(a, c, d, e) {
                var f;
                f = angular.element('<a class="ui-reset" />'), c.wrap('<span class="ui-resetwrap" />').after(f), f.bind("click", function(c) {
                    c.preventDefault(), a.$apply(function() {
                        e.$setViewValue(d.uiReset ? a.$eval(d.uiReset) : b), e.$render()
                    })
                })
            }
        }
    }]), angular.module("ui.route", []).directive("uiRoute", ["$location", "$parse", function(a, b) {
        return {
            restrict: "AC",
            scope: !0,
            compile: function(c, d) {
                var e;
                if (d.uiRoute) e = "uiRoute";
                else if (d.ngHref) e = "ngHref";
                else {
                    if (!d.href) throw new Error("uiRoute missing a route or href property on " + c[0]);
                    e = "href"
                }
                return function(c, d, f) {
                    function g(b) {
                        var d = b.indexOf("#");
                        d > -1 && (b = b.substr(d + 1)), (j = function() {
                            i(c, a.path().indexOf(b) > -1)
                        })()
                    }

                    function h(b) {
                        var d = b.indexOf("#");
                        d > -1 && (b = b.substr(d + 1)), (j = function() {
                            var d = new RegExp("^" + b + "$", ["i"]);
                            i(c, d.test(a.path()))
                        })()
                    }
                    var i = b(f.ngModel || f.routeModel || "$uiRoute").assign,
                        j = angular.noop;
                    switch (e) {
                        case "uiRoute":
                            f.uiRoute ? h(f.uiRoute) : f.$observe("uiRoute", h);
                            break;
                        case "ngHref":
                            f.ngHref ? g(f.ngHref) : f.$observe("ngHref", g);
                            break;
                        case "href":
                            g(f.href)
                    }
                    c.$on("$routeChangeSuccess", function() {
                        j()
                    }), c.$on("$stateChangeSuccess", function() {
                        j()
                    })
                }
            }
        }
    }]), angular.module("ui.scroll.jqlite", ["ui.scroll"]).service("jqLiteExtras", ["$log", "$window", function(a, b) {
        return {
            registerFor: function(a) {
                var c, d, e, f, g, h, i;
                return d = angular.element.prototype.css, a.prototype.css = function(a, b) {
                    var c, e;
                    return e = this, c = e[0], c && 3 !== c.nodeType && 8 !== c.nodeType && c.style ? d.call(e, a, b) : void 0
                }, h = function(a) {
                    return a && a.document && a.location && a.alert && a.setInterval
                }, i = function(a, b, c) {
                    var d, e, f, g, i;
                    return d = a[0], i = {
                        top: ["scrollTop", "pageYOffset", "scrollLeft"],
                        left: ["scrollLeft", "pageXOffset", "scrollTop"]
                    }[b], e = i[0], g = i[1], f = i[2], h(d) ? angular.isDefined(c) ? d.scrollTo(a[f].call(a), c) : g in d ? d[g] : d.document.documentElement[e] : angular.isDefined(c) ? d[e] = c : d[e]
                }, b.getComputedStyle ? (f = function(a) {
                    return b.getComputedStyle(a, null)
                }, c = function(a, b) {
                    return parseFloat(b)
                }) : (f = function(a) {
                    return a.currentStyle
                }, c = function(a, b) {
                    var c, d, e, f, g, h, i;
                    return c = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source, f = new RegExp("^(" + c + ")(?!px)[a-z%]+$", "i"), f.test(b) ? (i = a.style, d = i.left, g = a.runtimeStyle, h = g && g.left, g && (g.left = i.left), i.left = b, e = i.pixelLeft, i.left = d, h && (g.left = h), e) : parseFloat(b)
                }), e = function(a, b) {
                    var d, e, g, i, j, k, l, m, n, o, p, q, r;
                    return h(a) ? (d = document.documentElement[{
                        height: "clientHeight",
                        width: "clientWidth"
                    }[b]], {
                        base: d,
                        padding: 0,
                        border: 0,
                        margin: 0
                    }) : (r = {
                        width: [a.offsetWidth, "Left", "Right"],
                        height: [a.offsetHeight, "Top", "Bottom"]
                    }[b], d = r[0], l = r[1], m = r[2], k = f(a), p = c(a, k["padding" + l]) || 0, q = c(a, k["padding" + m]) || 0, e = c(a, k["border" + l + "Width"]) || 0, g = c(a, k["border" + m + "Width"]) || 0, i = k["margin" + l], j = k["margin" + m], n = c(a, i) || 0, o = c(a, j) || 0, {
                        base: d,
                        padding: p + q,
                        border: e + g,
                        margin: n + o
                    })
                }, g = function(a, b, c) {
                    var d, g, h;
                    return g = e(a, b), g.base > 0 ? {
                        base: g.base - g.padding - g.border,
                        outer: g.base,
                        outerfull: g.base + g.margin
                    }[c] : (d = f(a), h = d[b], (0 > h || null === h) && (h = a.style[b] || 0), h = parseFloat(h) || 0, {
                        base: h - g.padding - g.border,
                        outer: h,
                        outerfull: h + g.padding + g.border + g.margin
                    }[c])
                }, angular.forEach({
                    before: function(a) {
                        var b, c, d, e, f, g, h;
                        if (f = this, c = f[0], e = f.parent(), b = e.contents(), b[0] === c) return e.prepend(a);
                        for (d = g = 1, h = b.length - 1; h >= 1 ? h >= g : g >= h; d = h >= 1 ? ++g : --g)
                            if (b[d] === c) return void angular.element(b[d - 1]).after(a);
                        throw new Error("invalid DOM structure " + c.outerHTML)
                    },
                    height: function(a) {
                        var b;
                        return b = this, angular.isDefined(a) ? (angular.isNumber(a) && (a += "px"), d.call(b, "height", a)) : g(this[0], "height", "base")
                    },
                    outerHeight: function(a) {
                        return g(this[0], "height", a ? "outerfull" : "outer")
                    },
                    offset: function(a) {
                        var b, c, d, e, f, g;
                        return f = this, arguments.length ? void 0 === a ? f : a : (b = {
                            top: 0,
                            left: 0
                        }, e = f[0], (c = e && e.ownerDocument) ? (d = c.documentElement, e.getBoundingClientRect && (b = e.getBoundingClientRect()), g = c.defaultView || c.parentWindow, {
                            top: b.top + (g.pageYOffset || d.scrollTop) - (d.clientTop || 0),
                            left: b.left + (g.pageXOffset || d.scrollLeft) - (d.clientLeft || 0)
                        }) : void 0)
                    },
                    scrollTop: function(a) {
                        return i(this, "top", a)
                    },
                    scrollLeft: function(a) {
                        return i(this, "left", a)
                    }
                }, function(b, c) {
                    return a.prototype[c] ? void 0 : a.prototype[c] = b
                })
            }
        }
    }]).run(["$log", "$window", "jqLiteExtras", function(a, b, c) {
        return b.jQuery ? void 0 : c.registerFor(angular.element)
    }]), angular.module("ui.scroll", []).directive("ngScrollViewport", ["$log", function() {
        return {
            controller: ["$scope", "$element", function(a, b) {
                return b
            }]
        }
    }]).directive("ngScroll", ["$log", "$injector", "$rootScope", "$timeout", function(a, b, c, d) {
        return {
            require: ["?^ngScrollViewport"],
            transclude: "element",
            priority: 1e3,
            terminal: !0,
            compile: function(e, f, g) {
                return function(f, h, i, j) {
                    var k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z, A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T;
                    if (H = i.ngScroll.match(/^\s*(\w+)\s+in\s+(\w+)\s*$/), !H) throw new Error('Expected ngScroll in form of "item_ in _datasource_" but got "' + i.ngScroll + '"');
                    if (F = H[1], v = H[2], D = function(a) {
                            return angular.isObject(a) && a.get && angular.isFunction(a.get)
                        }, u = f[v], !D(u) && (u = b.get(v), !D(u))) throw new Error(v + " is not a valid datasource");
                    return r = Math.max(3, +i.bufferSize || 10), q = function() {
                        return T.height() * Math.max(.1, +i.padding || .1)
                    }, O = function(a) {
                        return a[0].scrollHeight || a[0].document.documentElement.scrollHeight
                    }, k = null, g(R = f.$new(), function(a) {
                        var b, c, d, f, g, h;
                        if (f = a[0].localName, "dl" === f) throw new Error("ng-scroll directive does not support <" + a[0].localName + "> as a repeating tag: " + a[0].outerHTML);
                        return "li" !== f && "tr" !== f && (f = "div"), h = j[0] || angular.element(window), h.css({
                            "overflow-y": "auto",
                            display: "block"
                        }), d = function(a) {
                            var b, c, d;
                            switch (a) {
                                case "tr":
                                    return d = angular.element("<table><tr><td><div></div></td></tr></table>"), b = d.find("div"), c = d.find("tr"), c.paddingHeight = function() {
                                        return b.height.apply(b, arguments)
                                    }, c;
                                default:
                                    return c = angular.element("<" + a + "></" + a + ">"), c.paddingHeight = c.height, c
                            }
                        }, c = function(a, b, c) {
                            return b[{
                                top: "before",
                                bottom: "after"
                            }[c]](a), {
                                paddingHeight: function() {
                                    return a.paddingHeight.apply(a, arguments)
                                },
                                insert: function(b) {
                                    return a[{
                                        top: "after",
                                        bottom: "before"
                                    }[c]](b)
                                }
                            }
                        }, g = c(d(f), e, "top"), b = c(d(f), e, "bottom"), R.$destroy(), k = {
                            viewport: h,
                            topPadding: g.paddingHeight,
                            bottomPadding: b.paddingHeight,
                            append: b.insert,
                            prepend: g.insert,
                            bottomDataPos: function() {
                                return O(h) - b.paddingHeight()
                            },
                            topDataPos: function() {
                                return g.paddingHeight()
                            }
                        }
                    }), T = k.viewport, B = 1, I = 1, p = [], J = [], x = !1, n = !1, G = u.loading || function() {}, E = !1, L = function(a, b) {
                        var c, d;
                        for (c = d = a; b >= a ? b > d : d > b; c = b >= a ? ++d : --d) p[c].scope.$destroy(), p[c].element.remove();
                        return p.splice(a, b - a)
                    }, K = function() {
                        return B = 1, I = 1, L(0, p.length), k.topPadding(0), k.bottomPadding(0), J = [], x = !1, n = !1, l(!1)
                    }, o = function() {
                        return T.scrollTop() + T.height()
                    }, S = function() {
                        return T.scrollTop()
                    }, P = function() {
                        return !x && k.bottomDataPos() < o() + q()
                    }, s = function() {
                        var b, c, d, e, f, g;
                        for (b = 0, e = 0, c = f = g = p.length - 1;
                            (0 >= g ? 0 >= f : f >= 0) && (d = p[c].element.outerHeight(!0), k.bottomDataPos() - b - d > o() + q()); c = 0 >= g ? ++f : --f) b += d, e++, x = !1;
                        return e > 0 ? (k.bottomPadding(k.bottomPadding() + b), L(p.length - e, p.length), I -= e, a.log("clipped off bottom " + e + " bottom padding " + k.bottomPadding())) : void 0
                    }, Q = function() {
                        return !n && k.topDataPos() > S() - q()
                    }, t = function() {
                        var b, c, d, e, f, g;
                        for (e = 0, d = 0, f = 0, g = p.length; g > f && (b = p[f], c = b.element.outerHeight(!0), k.topDataPos() + e + c < S() - q()); f++) e += c, d++, n = !1;
                        return d > 0 ? (k.topPadding(k.topPadding() + e), L(0, d), B += d, a.log("clipped off top " + d + " top padding " + k.topPadding())) : void 0
                    }, w = function(a, b) {
                        return E || (E = !0, G(!0)), 1 === J.push(a) ? z(b) : void 0
                    }, C = function(a, b) {
                        var c, d, e;
                        return c = f.$new(), c[F] = b, d = a > B, c.$index = a, d && c.$index--, e = {
                            scope: c
                        }, g(c, function(b) {
                            return e.element = b, d ? a === I ? (k.append(b), p.push(e)) : (p[a - B].element.after(b), p.splice(a - B + 1, 0, e)) : (k.prepend(b), p.unshift(e))
                        }), {
                            appended: d,
                            wrapper: e
                        }
                    }, m = function(a, b) {
                        var c;
                        return a ? k.bottomPadding(Math.max(0, k.bottomPadding() - b.element.outerHeight(!0))) : (c = k.topPadding() - b.element.outerHeight(!0), c >= 0 ? k.topPadding(c) : T.scrollTop(T.scrollTop() + b.element.outerHeight(!0)))
                    }, l = function(b, c, e) {
                        var f;
                        return f = function() {
                            return a.log("top {actual=" + k.topDataPos() + " visible from=" + S() + " bottom {visible through=" + o() + " actual=" + k.bottomDataPos() + "}"), P() ? w(!0, b) : Q() && w(!1, b), e ? e() : void 0
                        }, c ? d(function() {
                            var a, b, d;
                            for (b = 0, d = c.length; d > b; b++) a = c[b], m(a.appended, a.wrapper);
                            return f()
                        }) : f()
                    }, A = function(a, b) {
                        return l(a, b, function() {
                            return J.shift(), 0 === J.length ? (E = !1, G(!1)) : z(a)
                        })
                    }, z = function(b) {
                        var c;
                        return c = J[0], c ? p.length && !P() ? A(b) : u.get(I, r, function(c) {
                            var d, e, f, g;
                            if (e = [], 0 === c.length) x = !0, k.bottomPadding(0), a.log("appended: requested " + r + " records starting from " + I + " recieved: eof");
                            else {
                                for (t(), f = 0, g = c.length; g > f; f++) d = c[f], e.push(C(++I, d));
                                a.log("appended: requested " + r + " received " + c.length + " buffer size " + p.length + " first " + B + " next " + I)
                            }
                            return A(b, e)
                        }) : p.length && !Q() ? A(b) : u.get(B - r, r, function(c) {
                            var d, e, f, g;
                            if (e = [], 0 === c.length) n = !0, k.topPadding(0), a.log("prepended: requested " + r + " records starting from " + (B - r) + " recieved: bof");
                            else {
                                for (s(), d = f = g = c.length - 1; 0 >= g ? 0 >= f : f >= 0; d = 0 >= g ? ++f : --f) e.unshift(C(--B, c[d]));
                                a.log("prepended: requested " + r + " received " + c.length + " buffer size " + p.length + " first " + B + " next " + I)
                            }
                            return A(b, e)
                        })
                    }, M = function() {
                        return c.$$phase || E ? void 0 : (l(!1), f.$apply())
                    }, T.bind("resize", M), N = function() {
                        return c.$$phase || E ? void 0 : (l(!0), f.$apply())
                    }, T.bind("scroll", N), f.$watch(u.revision, function() {
                        return K()
                    }), y = u.scope ? u.scope.$new() : f.$new(), f.$on("$destroy", function() {
                        return y.$destroy(), T.unbind("resize", M), T.unbind("scroll", N)
                    }), y.$on("update.items", function(a, b, c) {
                        var d, e, f, g, h;
                        if (angular.isFunction(b))
                            for (e = function(a) {
                                    return b(a.scope)
                                }, f = 0, g = p.length; g > f; f++) d = p[f], e(d);
                        else 0 <= (h = b - B - 1) && h < p.length && (p[b - B - 1].scope[F] = c);
                        return null
                    }), y.$on("delete.items", function(a, b) {
                        var c, d, e, f, g, h, i, j, k, m, n, o;
                        if (angular.isFunction(b)) {
                            for (e = [], h = 0, k = p.length; k > h; h++) d = p[h], e.unshift(d);
                            for (g = function(a) {
                                    return b(a.scope) ? (L(e.length - 1 - c, e.length - c), I--) : void 0
                                }, c = i = 0, m = e.length; m > i; c = ++i) f = e[c], g(f)
                        } else 0 <= (o = b - B - 1) && o < p.length && (L(b - B - 1, b - B), I--);
                        for (c = j = 0, n = p.length; n > j; c = ++j) d = p[c], d.scope.$index = B + c;
                        return l(!1)
                    }), y.$on("insert.item", function(a, b, c) {
                        var d, e, f, g, h, i, j, k, m, n, o, q;
                        if (e = [], angular.isFunction(b)) {
                            for (f = [], i = 0, m = p.length; m > i; i++) c = p[i], f.unshift(c);
                            for (h = function(a) {
                                    var f, g, h, i, j;
                                    if (g = b(a.scope)) {
                                        if (C = function(a, b) {
                                                return C(a, b), I++
                                            }, angular.isArray(g)) {
                                            for (j = [], f = h = 0, i = g.length; i > h; f = ++h) c = g[f], j.push(e.push(C(d + f, c)));
                                            return j
                                        }
                                        return e.push(C(d, g))
                                    }
                                }, d = j = 0, n = f.length; n > j; d = ++j) g = f[d], h(g)
                        } else 0 <= (q = b - B - 1) && q < p.length && (e.push(C(b, c)), I++);
                        for (d = k = 0, o = p.length; o > k; d = ++k) c = p[d], c.scope.$index = B + d;
                        return l(!1, e)
                    })
                }
            }
        }
    }]), angular.module("ui.scrollfix", []).directive("uiScrollfix", ["$window", function(a) {
        return {
            require: "^?uiScrollfixTarget",
            link: function(b, c, d, e) {
                function f() {
                    var b;
                    if (angular.isDefined(a.pageYOffset)) b = a.pageYOffset;
                    else {
                        var e = document.compatMode && "BackCompat" !== document.compatMode ? document.documentElement : document.body;
                        b = e.scrollTop
                    }!c.hasClass("ui-scrollfix") && b > d.uiScrollfix ? c.addClass("ui-scrollfix") : c.hasClass("ui-scrollfix") && b < d.uiScrollfix && c.removeClass("ui-scrollfix")
                }
                var g = c[0].offsetTop,
                    h = e && e.$element || angular.element(a);
                d.uiScrollfix ? "string" == typeof d.uiScrollfix && ("-" === d.uiScrollfix.charAt(0) ? d.uiScrollfix = g - parseFloat(d.uiScrollfix.substr(1)) : "+" === d.uiScrollfix.charAt(0) && (d.uiScrollfix = g + parseFloat(d.uiScrollfix.substr(1)))) : d.uiScrollfix = g, h.on("scroll", f), b.$on("$destroy", function() {
                    h.off("scroll", f)
                })
            }
        }
    }]).directive("uiScrollfixTarget", [function() {
        return {
            controller: ["$element", function(a) {
                this.$element = a
            }]
        }
    }]), angular.module("ui.showhide", []).directive("uiShow", [function() {
        return function(a, b, c) {
            a.$watch(c.uiShow, function(a) {
                a ? b.addClass("ui-show") : b.removeClass("ui-show")
            })
        }
    }]).directive("uiHide", [function() {
        return function(a, b, c) {
            a.$watch(c.uiHide, function(a) {
                a ? b.addClass("ui-hide") : b.removeClass("ui-hide")
            })
        }
    }]).directive("uiToggle", [function() {
        return function(a, b, c) {
            a.$watch(c.uiToggle, function(a) {
                a ? b.removeClass("ui-hide").addClass("ui-show") : b.removeClass("ui-show").addClass("ui-hide")
            })
        }
    }]), angular.module("ui.unique", []).filter("unique", ["$parse", function(a) {
        return function(b, c) {
            if (c === !1) return b;
            if ((c || angular.isUndefined(c)) && angular.isArray(b)) {
                var d = [],
                    e = angular.isString(c) ? a(c) : function(a) {
                        return a
                    },
                    f = function(a) {
                        return angular.isObject(a) ? e(a) : a
                    };
                angular.forEach(b, function(a) {
                    for (var b = !1, c = 0; c < d.length; c++)
                        if (angular.equals(f(d[c]), f(a))) {
                            b = !0;
                            break
                        }
                    b || d.push(a)
                }), b = d
            }
            return b
        }
    }]), angular.module("ui.validate", []).directive("uiValidate", function() {
        return {
            restrict: "A",
            require: "ngModel",
            link: function(a, b, c, d) {
                function e(b) {
                    return angular.isString(b) ? void a.$watch(b, function() {
                        angular.forEach(g, function(a) {
                            a(d.$modelValue)
                        })
                    }) : angular.isArray(b) ? void angular.forEach(b, function(b) {
                        a.$watch(b, function() {
                            angular.forEach(g, function(a) {
                                a(d.$modelValue)
                            })
                        })
                    }) : void(angular.isObject(b) && angular.forEach(b, function(b, c) {
                        angular.isString(b) && a.$watch(b, function() {
                            g[c](d.$modelValue)
                        }), angular.isArray(b) && angular.forEach(b, function(b) {
                            a.$watch(b, function() {
                                g[c](d.$modelValue)
                            })
                        })
                    }))
                }
                var f, g = {},
                    h = a.$eval(c.uiValidate);
                h && (angular.isString(h) && (h = {
                    validator: h
                }), angular.forEach(h, function(b, c) {
                    f = function(e) {
                        var f = a.$eval(b, {
                            $value: e
                        });
                        return angular.isObject(f) && angular.isFunction(f.then) ? (f.then(function() {
                            d.$setValidity(c, !0)
                        }, function() {
                            d.$setValidity(c, !1)
                        }), e) : f ? (d.$setValidity(c, !0), e) : (d.$setValidity(c, !1), e)
                    }, g[c] = f, d.$formatters.push(f), d.$parsers.push(f)
                }), c.uiValidateWatch && e(a.$eval(c.uiValidateWatch)))
            }
        }
    }), angular.module("ui.utils", ["ui.event", "ui.format", "ui.highlight", "ui.include", "ui.indeterminate", "ui.inflector", "ui.jq", "ui.keypress", "ui.mask", "ui.reset", "ui.route", "ui.scrollfix", "ui.scroll", "ui.scroll.jqlite", "ui.showhide", "ui.unique", "ui.validate"]),
    function(b) {
        var a = {
            init: function(c) {
                return this.each(function() {
                    a.destroy.call(this), this.opt = b.extend(!0, {}, b.fn.raty.defaults, c);
                    var e = b(this),
                        g = ["number", "readOnly", "score", "scoreName"];
                    a._callback.call(this, g), this.opt.precision && a._adjustPrecision.call(this), this.opt.number = a._between(this.opt.number, 0, this.opt.numberMax), this.opt.path = this.opt.path || "", this.opt.path && "/" !== this.opt.path.slice(this.opt.path.length - 1, this.opt.path.length) && (this.opt.path += "/"), this.stars = a._createStars.call(this), this.score = a._createScore.call(this), a._apply.call(this, this.opt.score);
                    var f = this.opt.space ? 4 : 0,
                        d = this.opt.width || this.opt.number * this.opt.size + this.opt.number * f;
                    this.opt.cancel && (this.cancel = a._createCancel.call(this), d += this.opt.size + f), this.opt.readOnly ? a._lock.call(this) : (e.css("cursor", "pointer"), a._binds.call(this)), this.opt.width !== !1 && e.css("width", d), a._target.call(this, this.opt.score), e.data({
                        settings: this.opt,
                        raty: !0
                    })
                })
            },
            _adjustPrecision: function() {
                this.opt.targetType = "score", this.opt.half = !0
            },
            _apply: function(c) {
                c && c > 0 && (c = a._between(c, 0, this.opt.number), this.score.val(c)), a._fill.call(this, c), c && a._roundStars.call(this, c)
            },
            _between: function(e, d, c) {
                return Math.min(Math.max(parseFloat(e), d), c)
            },
            _binds: function() {
                this.cancel && a._bindCancel.call(this), a._bindClick.call(this), a._bindOut.call(this), a._bindOver.call(this)
            },
            _bindCancel: function() {
                a._bindClickCancel.call(this), a._bindOutCancel.call(this), a._bindOverCancel.call(this)
            },
            _bindClick: function() {
                var c = this,
                    d = b(c);
                c.stars.on("click.raty", function(e) {
                    c.score.val(c.opt.half || c.opt.precision ? d.data("score") : this.alt), c.opt.click && c.opt.click.call(c, parseFloat(c.score.val()), e)
                })
            },
            _bindClickCancel: function() {
                var c = this;
                c.cancel.on("click.raty", function(d) {
                    c.score.removeAttr("value"), c.opt.click && c.opt.click.call(c, null, d)
                })
            },
            _bindOut: function() {
                var c = this;
                b(this).on("mouseleave.raty", function(d) {
                    var e = parseFloat(c.score.val()) || void 0;
                    a._apply.call(c, e), a._target.call(c, e, d), c.opt.mouseout && c.opt.mouseout.call(c, e, d)
                })
            },
            _bindOutCancel: function() {
                var c = this;
                c.cancel.on("mouseleave.raty", function(d) {
                    b(this).attr("src", c.opt.path + c.opt.cancelOff), c.opt.mouseout && c.opt.mouseout.call(c, c.score.val() || null, d)
                })
            },
            _bindOverCancel: function() {
                var c = this;
                c.cancel.on("mouseover.raty", function(d) {
                    b(this).attr("src", c.opt.path + c.opt.cancelOn), c.stars.attr("src", c.opt.path + c.opt.starOff), a._target.call(c, null, d), c.opt.mouseover && c.opt.mouseover.call(c, null)
                })
            },
            _bindOver: function() {
                var c = this,
                    d = b(c),
                    e = c.opt.half ? "mousemove.raty" : "mouseover.raty";
                c.stars.on(e, function(g) {
                    var h = parseInt(this.alt, 10);
                    if (c.opt.half) {
                        var f = parseFloat((g.pageX - b(this).offset().left) / c.opt.size),
                            j = f > .5 ? 1 : .5;
                        h = h - 1 + j, a._fill.call(c, h), c.opt.precision && (h = h - j + f), a._roundStars.call(c, h), d.data("score", h)
                    } else a._fill.call(c, h);
                    a._target.call(c, h, g), c.opt.mouseover && c.opt.mouseover.call(c, h, g)
                })
            },
            _callback: function(c) {
                for (i in c) "function" == typeof this.opt[c[i]] && (this.opt[c[i]] = this.opt[c[i]].call(this))
            },
            _createCancel: function() {
                var e = b(this),
                    c = this.opt.path + this.opt.cancelOff,
                    d = b("<img />", {
                        src: c,
                        alt: "x",
                        title: this.opt.cancelHint,
                        "class": "raty-cancel"
                    });
                return "left" == this.opt.cancelPlace ? e.prepend("&#160;").prepend(d) : e.append("&#160;").append(d), d
            },
            _createScore: function() {
                return b("<input />", {
                    type: "hidden",
                    name: this.opt.scoreName
                }).appendTo(this)
            },
            _createStars: function() {
                for (var e = b(this), c = 1; c <= this.opt.number; c++) {
                    var f = a._getHint.call(this, c),
                        d = this.opt.score && this.opt.score >= c ? "starOn" : "starOff";
                    d = this.opt.path + this.opt[d], b("<img />", {
                        src: d,
                        alt: c,
                        title: f
                    }).appendTo(this), this.opt.space && e.append(c < this.opt.number ? "&#160;" : "")
                }
                return e.children("img")
            },
            _error: function(c) {
                b(this).html(c), b.error(c)
            },
            _fill: function(d) {
                for (var m = this, e = 0, f = 1; f <= m.stars.length; f++) {
                    var g = m.stars.eq(f - 1),
                        l = m.opt.single ? f == d : d >= f;
                    if (m.opt.iconRange && m.opt.iconRange.length > e) {
                        var j = m.opt.iconRange[e],
                            h = j.on || m.opt.starOn,
                            c = j.off || m.opt.starOff,
                            k = l ? h : c;
                        f <= j.range && g.attr("src", m.opt.path + k), f == j.range && e++
                    } else {
                        var k = l ? "starOn" : "starOff";
                        g.attr("src", this.opt.path + this.opt[k])
                    }
                }
            },
            _getHint: function(d) {
                var c = this.opt.hints[d - 1];
                return "" === c ? "" : c || d
            },
            _lock: function() {
                var d = parseInt(this.score.val(), 10),
                    c = d ? a._getHint.call(this, d) : this.opt.noRatedMsg;
                b(this).data("readonly", !0).css("cursor", "").attr("title", c), this.score.attr("readonly", "readonly"), this.stars.attr("title", c), this.cancel && this.cancel.hide()
            },
            _roundStars: function(e) {
                var d = (e - Math.floor(e)).toFixed(2);
                if (d > this.opt.round.down) {
                    var c = "starOn";
                    this.opt.halfShow && d < this.opt.round.up ? c = "starHalf" : d < this.opt.round.full && (c = "starOff"), this.stars.eq(Math.ceil(e) - 1).attr("src", this.opt.path + this.opt[c])
                }
            },
            _target: function(f, d) {
                if (this.opt.target) {
                    var e = b(this.opt.target);
                    0 === e.length && a._error.call(this, "Target selector invalid or missing!"), this.opt.targetFormat.indexOf("{score}") < 0 && a._error.call(this, 'Template "{score}" missing!');
                    var c = d && "mouseover" == d.type;
                    void 0 === f ? f = this.opt.targetText : null === f ? f = c ? this.opt.cancelHint : this.opt.targetText : ("hint" == this.opt.targetType ? f = a._getHint.call(this, Math.ceil(f)) : this.opt.precision && (f = parseFloat(f).toFixed(1)), c || this.opt.targetKeep || (f = this.opt.targetText)), f && (f = this.opt.targetFormat.toString().replace("{score}", f)), e.is(":input") ? e.val(f) : e.html(f)
                }
            },
            _unlock: function() {
                b(this).data("readonly", !1).css("cursor", "pointer").removeAttr("title"), this.score.removeAttr("readonly", "readonly");
                for (var c = 0; c < this.opt.number; c++) this.stars.eq(c).attr("title", a._getHint.call(this, c + 1));
                this.cancel && this.cancel.css("display", "")
            },
            cancel: function(c) {
                return this.each(function() {
                    b(this).data("readonly") !== !0 && (a[c ? "click" : "score"].call(this, null), this.score.removeAttr("value"))
                })
            },
            click: function(c) {
                return b(this).each(function() {
                    b(this).data("readonly") !== !0 && (a._apply.call(this, c), this.opt.click || a._error.call(this, 'You must add the "click: function(score, evt) { }" callback.'), this.opt.click.call(this, c, {
                        type: "click"
                    }), a._target.call(this, c))
                })
            },
            destroy: function() {
                return b(this).each(function() {
                    var d = b(this),
                        c = d.data("raw");
                    c ? d.off(".raty").empty().css({
                        cursor: c.style.cursor,
                        width: c.style.width
                    }).removeData("readonly") : d.data("raw", d.clone()[0])
                })
            },
            getScore: function() {
                var c, d = [];
                return b(this).each(function() {
                    c = this.score.val(), d.push(c ? parseFloat(c) : void 0)
                }), d.length > 1 ? d : d[0]
            },
            readOnly: function(c) {
                return this.each(function() {
                    var d = b(this);
                    d.data("readonly") !== c && (c ? (d.off(".raty").children("img").off(".raty"), a._lock.call(this)) : (a._binds.call(this), a._unlock.call(this)), d.data("readonly", c))
                })
            },
            reload: function() {
                return a.set.call(this, {})
            },
            score: function() {
                return arguments.length ? a.setScore.apply(this, arguments) : a.getScore.call(this)
            },
            set: function(c) {
                return this.each(function() {
                    var e = b(this),
                        f = e.data("settings"),
                        d = b.extend({}, f, c);
                    e.raty(d)
                })
            },
            setScore: function(c) {
                return b(this).each(function() {
                    b(this).data("readonly") !== !0 && (a._apply.call(this, c), a._target.call(this, c))
                })
            }
        };
        b.fn.raty = function(c) {
            return a[c] ? a[c].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" != typeof c && c ? void b.error("Method " + c + " does not exist!") : a.init.apply(this, arguments)
        }, b.fn.raty.defaults = {
            cancel: !1,
            cancelHint: "Cancel this rating!",
            cancelOff: "cancel-off.png",
            cancelOn: "cancel-on.png",
            cancelPlace: "left",
            click: void 0,
            half: !1,
            halfShow: !0,
            hints: ["bad", "poor", "regular", "good", "gorgeous"],
            iconRange: void 0,
            mouseout: void 0,
            mouseover: void 0,
            noRatedMsg: "Not rated yet!",
            number: 5,
            numberMax: 20,
            path: "",
            precision: !1,
            readOnly: !1,
            round: {
                down: .25,
                full: .6,
                up: .76
            },
            score: void 0,
            scoreName: "score",
            single: !1,
            size: 16,
            space: !0,
            starHalf: "star-half.png",
            starOff: "star-off.png",
            starOn: "star-on.png",
            target: void 0,
            targetFormat: "{score}",
            targetKeep: !1,
            targetText: "",
            targetType: "hint",
            width: void 0
        }
    }(jQuery);