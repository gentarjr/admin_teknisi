package com.skripsi.teknisi_user.teknisi;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;

import com.skripsi.teknisi_user.R;
import com.skripsi.teknisi_user.konfigurasi.RequestHandler;
import com.skripsi.teknisi_user.konfigurasi.konfigurasi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class Kinerja_teknisi extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.kinerja_teknisi);

        WebView web = (WebView) findViewById(R.id.webview);
        web.getSettings().setJavaScriptEnabled(true);
        web.getSettings().setLoadWithOverviewMode(true);
        web.getSettings().setUseWideViewPort(true);

        web.getSettings().setSupportZoom(true);
        web.getSettings().setBuiltInZoomControls(true);
        web.getSettings().setDisplayZoomControls(false);

        web.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);
        web.setScrollbarFadingEnabled(false);
        web.loadUrl("https://teknisi.testapp2020.com/kinerja_teknisi_user.php");
    }
}
