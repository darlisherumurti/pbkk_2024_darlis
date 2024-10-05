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
                            >Dasar</a
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
                            >Props</a
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
                            >Event Emission</a
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
                            >Slot</a
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
                            >Mixin</a
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
                                Vue component adalah instance Vue yang dapat
                                digunakan kembali dan memungkinkan pengguna
                                untuk memecah halaman web menjadi bagian-bagian
                                yang lebih kecil. Komponen Vue dapat dikerjakan
                                secara terpisah dari halaman web lainnya, dengan
                                konten dan logikanya sendiri.
                            </p>
                            <h2>Example</h2>
                            <div class="row">
                                <div class="col text-sm">
                                    <pre class="max-w-100" v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Hello, I am a component!&lt;/h1&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
  name: &apos;MyComponent&apos;
};
&lt;/script&gt;
                                    </code>
                                </pre>
                                </div>
                            </div>
                            <br />
                            <h2>Memakai Komponen</h2>
                            <div class="row">
                                <div class="col text-sm">
                                    <pre class="max-w-100" v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h2&gt;My Vue 3 Application&lt;/h2&gt;
    &lt;MyComponent /&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import MyComponent from &apos;./MyComponent.vue&apos;;

export default {
  components: { MyComponent }
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
                            Vue props adalah opsi konfigurasi di Vue.js yang
                            memungkinkan pengguna untuk mengirimkan data dari
                            komponen induk ke komponen anak. Data ini dikirimkan
                            melalui atribut khusus ke tag komponen.
                        </p>
                        <h2>Parent Component</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h2&gt;My Vue 3 Application&lt;/h2&gt;
    &lt;ChildComponent message=&quot;Hello from Parent!&quot; /&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import ChildComponent from &apos;./ChildComponent.vue&apos;;

export default {
  components: { ChildComponent }
};
&lt;/script&gt;
                                    </code>
                                </pre>
                            </div>
                        </div>
                        <br />
                        <h2>Child Component</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;p&gt;{{ message }}&lt;/p&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
  props: {
    message: { type: String, required: true }
  }
};
&lt;/script&gt;

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
                            Vue event emission adalah proses pengiriman Event
                            khusus dari komponen anak ke komponen induk dalam
                            Vue.js. Proses ini dilakukan dengan menggunakan
                            metode $emit() bawaan di Vue.
                        </p>
                        <h2>Parent Component</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Parent Component&lt;/h1&gt;
    &lt;ChildComponent @example-event=&quot;handleEvent&quot; /&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import ChildComponent from &apos;./ChildComponent.vue&apos;;

export default {
  components: { ChildComponent },
  methods: {
    handleEvent(payload) {
      console.log(&apos;Received from child:&apos;, payload);
      alert(&grave;Message from child: ${payload}&grave;);
    }
  }
};
&lt;/script&gt;


                                    </code>
                                </pre>
                            </div>
                        </div>
                        <br />
                        <h2>Child Component</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h2&gt;Child Component&lt;/h2&gt;
    &lt;button @click=&quot;emitMessage&quot;&gt;Click to Emit Message&lt;/button&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
  methods: {
    emitMessage() {
      this.$emit(&apos;example-event&apos;, &apos;Hello from Child!&apos;); // Emitting the event
    }
  }
};
&lt;/script&gt;
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
                            Vue Mixin adalah cara untuk mendistribusikan
                            fungsionalitas yang dapat digunakan kembali untuk
                            komponen Vue. Mixin menyediakan tempat yang aman
                            untuk menyimpan logika, sehingga Anda tidak perlu
                            mengulang kode yang sama.
                        </p>
                        <h2>Example Mixin</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-javascript max-w-100">
// myMixin.js
export const myMixin = {
  data() {
    return {
      sharedData: &apos;Shared Data from Mixin&apos;
    };
  },
  methods: {
    sharedMethod() {
      console.log(&apos;This is a method from the mixin.&apos;);
    }
  }
};

                                    </code> 
                                </pre>
                            </div>
                        </div>
                        <br />
                        <h2>Memakai Mixin</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;{{ sharedData }}&lt;/h1&gt;
    &lt;button @click=&quot;sharedMethod&quot;&gt;Call Mixin Method&lt;/button&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import { myMixin } from &apos;./myMixin.js&apos;;

export default {
  mixins: [myMixin] // Include the mixin
};
&lt;/script&gt;


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
                            Vue slot adalah fitur di Vue.js yang memungkinkan
                            pengiriman konten dari induk ke /<template />
                            komponen anak. Fitur ini memungkinkan komponen yang
                            lebih fleksibel dan dapat digunakan kembali.
                        </p>
                        <h2>Parent Component</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h2&gt;Parent Component&lt;/h2&gt;
    &lt;ChildComponent&gt;
      &lt;p&gt;This content is passed to the child component.&lt;/p&gt;
    &lt;/ChildComponent&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
import ChildComponent from &apos;./ChildComponent.vue&apos;;

export default {
  components: { ChildComponent }
};
&lt;/script&gt;
                                    </code> 
                                </pre>
                            </div>
                        </div>
                        <br />
                        <h2>Child Component</h2>
                        <div class="row">
                            <div class="col text-sm">
                                <pre v-pre>
                                    <code class="language-html max-w-100">
&lt;template&gt;
  &lt;div&gt;
    &lt;h3&gt;Child Component&lt;/h3&gt;
    &lt;slot&gt;&lt;/slot&gt; &lt;!-- Default slot for content --&gt;
  &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
  name: &apos;ChildComponent&apos;
};
&lt;/script&gt;

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
