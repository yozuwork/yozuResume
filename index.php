<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOZU Portfolio</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.3.4/vue.global.prod.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css    ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/main.css">
</head>
<body>  
    <div id="app">
        <div class="container">
            <div class="window">
                <div class="title-bar">
                    <div class="window-controls">
                        <div class="control"></div>
                        <div class="control"></div>
                        <div class="control"></div>
                    </div>
                </div>

                <!-- 首頁內容 -->
                <template v-if="currentRoute === 'home'">
                    <div class="hero-section">
                        <div class="hero-text">
                            <h1>Hello.<br>I'm YOZU.</h1>
                            <p>前端與後端工程師<br> 前端有1-2年實務經驗 後端擁有半年的實務經驗</p>
                            <div class="nav-links">
                                <a href="https://github.com/yozuwork" class="nav-link">Github <i class="fa-brands fa-github"></i></a>
                            </div>
                        </div>
                        <div class="hero-image">
                            <img src="assets/images/people.jpg" alt="Retro Computer" style="width: 50%; border: 2px solid #1a1a1a;">
                        </div>
                    </div>

                    <div class="portfolio-section">
                        <!-- 分類標籤 -->
                        <div class="category-tabs">
                            <div 
                                v-for="(category, index) in categories" 
                                :key="index"
                                class="category-tab"
                                :class="{ active: currentCategory === category.value }"
                                @click="filterProjects(category.value)"
                            >
                                {{ category.name }}
                            </div>
                        </div>

                        <div class="portfolio-grid">
                            <div v-for="(work, index) in filteredWorks" 
                                 :key="index" 
                                 class="portfolio-item d-flex flex-column">
                                <img :src="work.image" :alt="work.title">
                                <h3>{{ work.title }}</h3>
                                <p>{{ work.description }}</p>
                                <div class="d-flex justify-content-center mt-auto">
                                    <button href="#"  
                                       class="btn btn-lg px-5  view-project"
                                       @click.prevent="viewProject(work)">
                                        查看作品
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- 作品詳情頁面 -->
                <template v-else-if="currentRoute === 'project' && selectedProject">
                    <div class="project-detail">
                        <a href="#" class="back-button" @click.prevent="goToHome">返回首頁</a>
                        
                        <h1 class="project-title">{{ selectedProject.title }}</h1>
                        <img :src="selectedProject.image" :alt="selectedProject.title" 
                             style="width: 100%; border: 2px solid #1a1a1a;">
                        
                        <div class="project-content">
                            <div class="project-description">
                                <p v-html="selectedProject.longDescription"></p>
                            </div>
                            
                            <div >
                                <div class="project-info">
                                    <h3 style="margin-bottom: 15px;">作品資訊</h3>
                                    <p><strong>分類:</strong> {{ selectedProject.category }}</p>
                                    <p><strong>製作期間:</strong> {{ selectedProject.date }}</p>
                                    <p><strong>客戶:</strong> {{ selectedProject.client }}</p>
                                </div>
                                <button href="#"  
                                class="btn btn-lg w-100  view-project mt-2" type="button" 
                                @click="goToWeb(selectedProject.link)"
                                v-if="selectedProject.link"   > <!-- 只在有連結時顯示按鈕 -->
                                  前往官方網站
                                </button>
                            </div>
                        </div>

                        <div class="w-100  ">
                            <div  >
                                <img v-for="(image, index) in selectedProject.gallery"  class="mt-2"
                                     :key="index"
                                     :src="image"
                                     :alt="`Gallery image ${index + 1}`"
                                     style="width: 100%; border: 2px solid #1a1a1a;">
                            </div>
                            
                        </div>
                        <div class="d-flex justify-content-center"><button  type="button" class="back-button mt-3" @click.prevent="goToHome">返回首頁</a></div>
                    </div>
                </template>
            </div>
        </div>
    </div>

     <script src="assets/main.js"></script>
</body>
</html>