'use strict';

// import * as Math from "lodash";

function getDocumentHeight() {
	var body = document.body;
	var html = document.documentElement;

	return Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
};

function getScrollTop() {
	return window.pageYOffset !== undefined ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
}

function getArticleImage() {
	var hash = Math.floor(Math.random() * Number.MAX_SAFE_INTEGER);
	var image = new Image();
	image.className = 'article-list__item__image article-list__item__image--loading';
	image.src = 'http://api.adorable.io/avatars/250/' + hash;

	image.onload = function () {
		image.classList.remove('article-list__item__image--loading');
	};

	return image;
}

function getArticle() {
	var articleImage = getArticleImage();
	var article = document.createElement('article');
	article.className = 'article-list__item';
	article.appendChild(articleImage);

	return article;
}

function getArticlePage(page) {
	var articlesPerPage = arguments.length <= 1 || arguments[1] === undefined ? 16 : arguments[1];

	var pageElement = document.createElement('div');
	pageElement.id = getPageId(page);
	pageElement.className = 'article-list__page';

	while (articlesPerPage--) {
		pageElement.appendChild(getArticle());
	}

	return pageElement;
}

function addPaginationPage(page) {
	var pageLink = document.createElement('a');
	pageLink.href = '#' + getPageId(page);
	pageLink.innerHTML = page;

	var listItem = document.createElement('li');
	listItem.className = 'article-list__pagination__item';
	listItem.appendChild(pageLink);

	articleListPagination.appendChild(listItem);

	if (page === 2) {
		articleListPagination.classList.remove('article-list__pagination--inactive');
	}
}

function fetchPage(page) {
	articleList.appendChild(getArticlePage(page));
}

function addPage(page) {
	fetchPage(page);
	addPaginationPage(page);
}

function scrolling_manager() {
	var everlongList = document.getElementById('article-list');
	var articleListPagination = document.getElementById('article-list-pagination');

	var page = 1;

	return 'article-page-' + n;

	function getPageId(n) {}
}

$(document).ready(function () {
	var page = 0;

	addPage(++page);

	$(window).onscroll = function () {
		if (getScrollTop() < getDocumentHeight() - window.innerHeight) return;
		addPage(++page);
	};
});

//# sourceMappingURL=scrolling.js.map