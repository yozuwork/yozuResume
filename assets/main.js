const { createApp } = Vue;

createApp({
    data() {
        return {
            currentRoute: 'home',
            currentCategory: 'all',
            selectedProject: null,
            categories: [
                { name: '全部', value: 'all' },
                { name: '個人專案', value: 'personal' },
                { name: '公司專案', value: 'company' }
                
            ],
            works: [
                {
                    title: "玄通營造",
                    description: "在此專案中，我主要負責前端與後端的開發，除了將設計師提供的 UI 設計稿還原為前端頁面外，還需進行後端邏輯與資料庫的設計與開發，確保網站功能的完整實現。",
                    image: "assets/images/xuan.png",
                    category: "company",
                    date: "2024",
                    client: "玄通營造",
                    longDescription: `
                    <div class="project-description">
                        <p>
                            在此專案中，我主要負責前端與後端的開發，
                            除了將設計師提供的 UI 設計稿還原為前端頁面外，
                            還需進行後端邏輯與資料庫的設計與開發，確保網站功能的完整實現。
                        </p>

                        <ul>
                            <li>
                                <h3>前端與後端開發</h3>
                                <ul>
                                    <li>使用 PHP 進行全端開發，涵蓋前端頁面展示與後端資料處理功能的實作</li>
                                    <li>能夠將 PHP 與資料庫順利介接，實現動態內容的顯示與用戶操作的處理</li>
                                </ul>
                            </li>

                            <li>
                                <h3>RWD 與樣式開發</h3>
                                <ul>
                                    <li>使用並自定義 Bootstrap 5 格線系統來實現響應式設計（RWD）</li>
                                    <li>根據需求調整格線系統與斷點設計，使頁面在不同屏幕尺寸上顯示自適應效果</li>
                                </ul>
                            </li>

                            <li>
                                <h3>樣式與結構設計</h3>
                                <ul>
                                    <li>使用 SCSS 進行樣式的分離設計，將容器和樣式進行拆分，提升代碼的可維護性與可擴展性</li>
                                    <li>根據頁面區塊進行模組化開發，重用性高，便於後期擴展與修改</li>
                                </ul>
                            </li>

                            <li>
                                <h3>資料庫管理與後台設計</h3>
                                <ul>
                                    <li>使用 MySQL Workbench 設計與管理後台資料庫</li>
                                    <li>基本的資料庫操作，能夠進行增、刪、查、改等操作，並結合後端邏輯來實現資料的動態存取</li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                    `,
                    gallery: [
                        "assets/images/wd02-b585fc0b.png",

                    ],
                    link:"https://xt-const.com.tw/",
                    order: 2,
                },
                {
                    title: "Vue漫畫電商主題網站",
                    description: "這是我目前的個人練習作品，使用了以下技術和插件：",
                    image: "assets/images/bookshop.jpg",
                    category: "personal",
                    date: "2024",
                    client: "我自己",
                    longDescription: `
                        <div class="project-description">
                            <ul>
                                <li>
                                    <h3>技術</h3>
                                    <ul>
                                        <li>Vue 3：用於構建前端應用</li>
                                        <li>Vue CLI：用來快速搭建 Vue 開發環境</li>
                                        <li>Pinia.js：作為狀態管理工具，負責跨元件資料的傳遞</li>
                                    </ul>
                                </li>

                                <li>
                                    <h3>插件</h3>
                                    <ul>
                                        <li>Vue Router：管理應用的路由與頁面導航</li>
                                        <li>Vue Axios：用來進行 HTTP 請求，獲取遠端資料</li>
                                        <li>vue-loading-overlay：用於顯示加載提示層，提升用戶體驗</li>
                                        <li>Pinia：輔助管理應用的全局狀態</li>
                                        <li>Bootstrap 5：提供響應式佈局和現成的 UI 元素</li>
                                        <li>Lodash：提供多種有用的 JavaScript 工具函數</li>
                                        <li>Font Awesome：用來插入可自定義的字型圖示</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    `,
                    gallery: [
                        "assets/images/bookshop01.jpg",
                        "assets/images/bookshop02.jpg",
                        "assets/images/bookshop03.jpg",
                        "assets/images/bookshop04.jpg",
                        "assets/images/bookshop05.jpg",
                        "assets/images/bookshop06.jpg"
                    ],
                    link:"",
                    order:1,
                }
            ]
        }
    },
    computed: {
        filteredWorks() {
            let filtered = this.currentCategory === 'all' 
                ? this.works 
                : this.works.filter(work => work.category === this.currentCategory);
                
            // 根據 order 屬性排序
            return filtered.sort((a, b) => a.order - b.order);
        }
    },
    methods: {
        filterProjects(category) {
            this.currentCategory = category;
        },
        viewProject(project) {
            this.selectedProject = project;
            this.currentRoute = 'project';
        },
        goToHome() {
            this.currentRoute = 'home';
            this.selectedProject = null;
        },
        goToWeb(link) {  // 修改為接收 link 參數
            if (link) {  // 檢查 link 是否存在
                window.open(link);
            }
        }
    }
}).mount('#app');