<template>
    <div>
        <div class="card">
            <div class="card-header">
                <ul
                    class="nav nav-tabs card-header-tabs"
                    id="myTab"
                    role="tablist"
                >
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="data-binding-tab"
                            data-toggle="tab"
                            href="#data-binding"
                            role="tab"
                            aria-controls="data-binding"
                            aria-selected="true"
                            >Overview</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="profile-tab"
                            data-toggle="tab"
                            href="#profile"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                            >Created</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="contact-tab"
                            data-toggle="tab"
                            href="#contact"
                            role="tab"
                            aria-controls="contact"
                            aria-selected="false"
                            >Mounted</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="v-on-tab"
                            data-toggle="tab"
                            href="#v-on"
                            role="tab"
                            aria-controls="v-on"
                            aria-selected="false"
                            >Updated</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="tab5-tab"
                            data-toggle="tab"
                            href="#tab5"
                            role="tab"
                            aria-controls="tab5"
                            aria-selected="false"
                            >Before Unmount</a
                        >
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="data-binding"
                        role="tabpanel"
                        aria-labelledby="data-binding-tab"
                    >
                        <div>
                            <p>
                                Vue component lifecycle adalah tahap-tahap yang
                                dilalui oleh suatu komponen Vue, di mana kode
                                dapat ditambahkan untuk melakukan sesuatu.
                                Tahap-tahap ini disebut sebagai kait siklus
                                hidup (lifecycle hook).
                            </p>
                            <h2>Example</h2>
                            <div class="row">
                                <div class="col text-sm">
                                    <pre class="max-w-100" v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;Example Component&lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
  created() {
    console.log(&apos;Component has been created!&apos;);
  },
  mounted() {
    console.log(&apos;Component has been mounted to the DOM!&apos;);
  },
  updated() {
    console.log(&apos;Component has been updated!&apos;);
  },
  beforeUnmount() {
    console.log(&apos;Component will be unmounted!&apos;);
  }
};
&lt;/script&gt;
                                    </code>
                                </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <p>
                            Pada tahap ini, komponen baru saja dibuat dan
                            instansinya telah diinisialisasi.
                        </p>
                        <p>
                            Data reaktif sudah disiapkan, tetapi komponen belum
                            ditambahkan ke DOM.
                        </p>
                        <p>
                            Fase ini dapat digunakan untuk menginisialisasi
                            data, mengatur event listener, atau melakukan
                            pengambilan data dari API.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-javascript max-w-100">
created() {
    console.log('Component has been created!');
    fetch('https://example.com/api/data').then(response => response.json());
},
                                    </code>
                                </pre>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="contact"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        <p>
                            Vue mounted() adalah hook siklus hidup yang
                            dijalankan saat komponen ditambahkan ke DOM
                            (Document Object Model). Hook ini merupakan salah
                            satu hook siklus hidup yang paling umum digunakan
                            dalam Vue.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-javascript max-w-100">
mounted() {
    console.log('Component has been mounted to the DOM!');
},
                                    </code>
                                </pre>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-on"
                        role="tabpanel"
                        aria-labelledby="v-on-tab"
                    >
                        <p>
                            Vue updated lifecycle adalah fase pembaruan dalam
                            kait siklus hidup Vue.js yang dipicu ketika data
                            berubah dan komponen perlu dirender ulang. Kait
                            siklus hidup Vue.js adalah fungsi khusus yang
                            memungkinkan pengembang untuk mengaitkan
                            fungsionalitas khusus pada momen tertentu.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-javascript max-w-100">
updated() {
    console.log('Component has been updated!');
},
                                    </code>
                                </pre>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="tab5"
                        role="tabpanel"
                        aria-labelledby="tab5-tab"
                    >
                        <p>
                            Vue beforemount lifecycle adalah kait siklus hidup
                            yang dipanggil tepat sebelum komponen DOM dipasang
                            dan dirender. Kait ini terjadi sebelum komponen
                            ditambahkan ke DOM, sehingga elemen DOM belum dapat
                            diakses.
                        </p>
                        <h2>Example</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-javascript max-w-100">
beforeUnmount() {
    console.log('Component will be unmounted!');

},
                                    </code>
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts"></script>
